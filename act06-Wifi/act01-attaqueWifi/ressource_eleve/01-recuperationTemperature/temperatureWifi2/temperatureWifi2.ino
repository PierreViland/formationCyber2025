#include <WiFi.h>
#include <HTTPClient.h>

#define addr_serveur "http://192.168.1.135"

#define _A1 String
#define _ZZ1 "\163\141\154\154\145\103\111\105\114\62"
#define _B1 Serial.begin
#define _C1 Serial.print
#define _D1 Serial.println
#define _E1 delay
#define _F1 WiFi.begin
#define _G1 WiFi.status
#define _H1 WL_CONNECTED
#define _I1 temperatureRead
#define _J1 HTTPClient
#define _K1 addHeader
#define _L1 begin
#define _M1 POST
#define _N1 getString
#define _O1 end
#define _LO loop
#define _SE setup
#define _ZZ4 80
#define _ZZ5 "\120\126\137\144\145\166\151\143\145"
#define _ZZ2 "\151\141\155\141\162\157\143\153\163\164\141\162"
void _SE() {
  _B1(115200);
  _C1("Connexion à ");
  _C1(_ZZ1);
  _F1(_ZZ1,_ZZ2);
  while (_G1() != _H1) {
    _E1(500);
    _C1(".");
  }
  _D1("\nConnecté au réseau Wi-Fi !");
  _C1("Adresse IP de l'ESP32 : ");
  _D1(WiFi.localIP());
  _A1 mac = WiFi.macAddress();
  _C1("Adresse MAC de l'ESP32 : ");
  _D1(mac);
  
}
void _LO() {
  if (_G1() == _H1) {
    float _XX1 = _I1();
    _J1 http;
    _A1 url = _A1(addr_serveur) + ":" + String(_ZZ4) + "/data";
    http._L1(url);
    http._K1("Content-Type", "application/json");
    _A1 postData = "{\"id\":\"" + String(_ZZ5) + "\",\"temperature\":" + String(_XX1) + "}";
    int _XX2 = http._M1(postData);
    if (_XX2 > 0) {
      _A1 response = http._N1();
      _C1("Réponse du serveur : " + response + "\n");
    } else {
      _C1("Erreur d'envoi : " + String(_XX2));
    }
    http._O1();
  } else {
    _C1("Déconnecté du Wi-Fi, tentative de reconnexion...");
    WiFi.reconnect();
  }
  _E1(5000);
}
