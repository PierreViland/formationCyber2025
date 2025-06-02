import os
import ssl
import json
import time
import logging
import socket
from http.server import HTTPServer, BaseHTTPRequestHandler

# Configurer l'exportation des clés de session pour Wireshark
os.environ['SSLKEYLOGFILE'] = './ssl_keys.log'

# Configuration des logs
logging.basicConfig(
    level=logging.DEBUG,
    format='%(asctime)s - %(levelname)s - %(message)s',
    handlers=[
        logging.StreamHandler(),
        logging.FileHandler("server.log", mode='a')
    ]
)
logger = logging.getLogger(__name__)

HOST = '0.0.0.0'
PORT = 443  # Port HTTPS standard

class RequestHandler(BaseHTTPRequestHandler):
    def do_POST(self):
        logger.info("Réception d'une requête POST de %s", self.client_address)
        content_length = int(self.headers['Content-Length'])
        post_data = self.rfile.read(content_length)

        try:
            data = json.loads(post_data)
            device_id = data.get('id', 'ID inconnu')
            temperature = data.get('temperature', 'Température inconnue')

            # Affichage des données
            current_timestamp = time.strftime("%Y-%m-%d %H:%M:%S", time.localtime())
            print(f"{current_timestamp} - ID : {device_id}")
            print(f"Température : {temperature}°C")
            if temperature > 100:
                print("+++++++++++ALERTE CHALEUR+++++++++++")
            elif temperature < 5:
                print("+++++++++++ALERTE GRAND FROID+++++++++++")

            # Réponse au client
            self.send_response(200)
            self.send_header('Content-Type', 'application/json')
            self.end_headers()
            self.wfile.write(json.dumps({"status": "OK"}).encode('utf-8'))

        except json.JSONDecodeError:
            logger.error("Erreur de décodage JSON : %s", post_data)
            self.send_response(400)
            self.end_headers()
            self.wfile.write(b"Invalid JSON")
        except Exception as e:
            logger.error("Erreur lors du traitement de la requête POST de %s : %s", self.client_address, e)
            self.send_response(500)
            self.end_headers()
            self.wfile.write(b"Erreur interne du serveur")

    def log_message(self, format, *args):
        return  # Désactive les logs HTTP standards pour une console plus propre

if __name__ == "__main__":
    server = HTTPServer((HOST, PORT), RequestHandler)

    try:
        # Créer un contexte SSL
        ssl_context = ssl.create_default_context(ssl.Purpose.CLIENT_AUTH)
        ssl_context.load_cert_chain(certfile='./serveur/serverPV19.crt', keyfile='./serveur/serverPV19.key')
        ssl_context.load_verify_locations(cafile='./CA/CAPV.crt')
        ssl_context.verify_mode = ssl.CERT_REQUIRED  # Exige un certificat client valide

        # Emballer le socket avec SSL
        server.socket = ssl_context.wrap_socket(server.socket, server_side=True)
        logger.info("Serveur HTTPS démarré sur %s:%d", HOST, PORT)

        server.serve_forever()

    except ssl.SSLError as e:
        logger.error("Erreur lors de l'établissement de la connexion SSL : %s", e)
    except socket.error as e:
        logger.error("Erreur de socket lors de l'initialisation du serveur : %s", e)
    except Exception as e:
        logger.critical("Erreur inattendue lors du démarrage du serveur : %s", e)
    finally:
        logger.info("Arrêt du serveur.")
        server.server_close()
