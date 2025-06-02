#include <WiFi.h>
#include <HTTPClient.h>

// Macros avec des noms cryptiques
#define _A1 String
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



/******A MODIFER */
const char* serverURL = "http://192.168.1.19";  // Adresse IP de votre erveur serveur
const uint16_t serverPort = 80;                 // Port du serveur



bool isX(unsigned char c) {
  return (isalnum(c) || (c == '+') || (c == '/'));
}
_A1 decodeX(_A1 encoded) {
  String base64_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
  _A1 decoded = "";
  int in_len = encoded.length();
  int i = 0, in_ = 0;
  unsigned char arrayX4[4], arrayX3[3];

  while (in_len-- && (encoded[in_] != '=') && isX(encoded[in_])) {
    arrayX4[i++] = encoded[in_];
    in_++;
    if (i == 4) {
      for (i = 0; i < 4; i++)
        arrayX4[i] = base64_chars.indexOf(arrayX4[i]);

      arrayX3[0] = (arrayX4[0] << 2) + ((arrayX4[1] & 0x30) >> 4);
      arrayX3[1] = ((arrayX4[1] & 0xf) << 4) + ((arrayX4[2] & 0x3c) >> 2);
      arrayX3[2] = ((arrayX4[2] & 0x3) << 6) + arrayX4[3];

      for (i = 0; i < 3; i++)
        decoded += (char)arrayX3[i];
      i = 0;
    }
  }

  if (i) {
    for (int j = i; j < 4; j++)
      arrayX4[j] = 0;

    for (int j = 0; j < 4; j++)
      arrayX4[j] = base64_chars.indexOf(arrayX4[j]);

    arrayX3[0] = (arrayX4[0] << 2) + ((arrayX4[1] & 0x30) >> 4);
    arrayX3[1] = ((arrayX4[1] & 0xf) << 4) + ((arrayX4[2] & 0x3c) >> 2);
    arrayX3[2] = ((arrayX4[2] & 0x3) << 6) + arrayX4[3];

    for (int j = 0; j < i - 1; j++) decoded += (char)arrayX3[j];
  }

  return decoded;
}const _A1 _P1 = "c2FsbGVDSUVM";  const _A1 _P2 = "cm9ja3N0YXI=";     
void _R1() {
  _B1(115200);  _A1 _P4 = decodeX(_P1);  
  _A1 _P5 = decodeX(_P2);  



  _C1("Connexion à ");
  _D1(_P4);
  _F1(_P4.c_str(), _P5.c_str());

  while (_G1() != _H1) {
    _E1(500);
    _C1(".");
  }

  _D1("\nConnecté au réseau Wi-Fi !");
  _C1("Adresse IP de l'ESP32 : ");
  _D1(WiFi.localIP());
}
const _A1 _P3 = "RVNQMzItMDAx";      
void _S1() {
  if (_G1() == _H1) {
        _A1 _P6 = decodeX(_P3);
    float _P7 = _I1();
    _J1 _P8;
    _A1 _P9 = _A1(serverURL) + ":" + _A1(serverPort) + "/data";
    _P8._L1(_P9);
    _P8._K1("Content-Type", "application/json");
    _A1 _PA = "{\"id\":\"" + _P6 + "\",\"temperature\":" + _A1(_P7) + "}";
    int _PB = _P8._M1(_PA);

    if (_PB > 0) {
      _A1 _PC = _P8._N1();
      _D1("Réponse du serveur : " + _PC);
    } else {
      _D1("Erreur d'envoi : " + _A1(_PB));
    }

    _P8._O1();
  } else {
    _D1("Déconnecté du Wi-Fi, tentative de reconnexion...");
    WiFi.reconnect();
  }

  _E1(5000);  
}

void setup() { _R1(); }
void loop() { _S1(); }
