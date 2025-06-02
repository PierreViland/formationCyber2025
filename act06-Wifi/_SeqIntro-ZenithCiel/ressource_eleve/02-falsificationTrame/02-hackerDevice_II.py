import requests
import json
import time

# URL du serveur A MODIFIER 
server_url = "http://192.168.1.19:80/data"

# Id du device A MODIFIER
device_id = "ESP32-001"

# Données a MODIFIER
temperature = 2.5 # A modifier

# Données JSON à envoyer
data = {
    "id": device_id,
    "temperature": temperature
}

# En-têtes de la requête (optionnel, mais recommandé pour spécifier le type de contenu)
headers = {
    "Content-Type": "application/json"
}


while True:
    
    response = requests.post(server_url, data=json.dumps(data), headers=headers)

    # Affichage de la réponse du serveur
    if response.status_code == 200:
        print("Réponse du serveur :", response.text)
    else:
        print(f"Erreur d'envoi : {response.status_code}, {response.text}")

    time.sleep(0.2)
