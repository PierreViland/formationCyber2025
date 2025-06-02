import ssl
import http.client
import json

# Configuration réseau
server_url = "_________"  # Adresse IP du serveur
server_port = 443  # Port HTTPS

# Certificats et cle
ca_cert_path = ".\CA\______.crt"  # Chemin vers le certificat CA
client_cert_path = ".\device\________.crt"  # Chemin vers le certificat client
client_key_path = ".\device\________.key"  # Chemin vers la clé privée du client

# Fonction pour simuler la lecture de température
def read_temperature():
   
    return 2.5

def main():
    # Création d'un contexte SSL
    context = ssl.create_default_context(ssl.Purpose.SERVER_AUTH, cafile=ca_cert_path)
    context.load_cert_chain(certfile=client_cert_path, keyfile=client_key_path)

    # Connexion au serveur
    connection = http.client.HTTPSConnection(server_url, server_port, context=context)
    try:
        print("Connexion au serveur...")

        # Données à envoyer
        temperature = read_temperature()
        payload = {
            "id": "ESP32-____",
            "temperature": temperature
        }
        json_data = json.dumps(payload)

        # Configuration de la requête POST
        headers = {
            "Content-Type": "application/json",
            "Content-Length": str(len(json_data))
        }
        connection.request("POST", "/data", body=json_data, headers=headers)

        # Lecture de la réponse
        response = connection.getresponse()
        print(f"Statut : {response.status} {response.reason}")
        print("Réponse du serveur :")
        print(response.read().decode())
    except Exception as e:
        print("Erreur :", e)
    finally:
        connection.close()

if __name__ == "__main__":
    main()
