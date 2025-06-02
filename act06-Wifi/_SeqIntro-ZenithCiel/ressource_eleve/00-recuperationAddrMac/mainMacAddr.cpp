#include <WiFi.h>

void setup() {
  
  Serial.begin(115200);
  delay(1000); 

  String mac = WiFi.macAddress();
  Serial.println("Adresse MAC de l'ESP32 :");
  Serial.println(mac);
}

void loop() {
  
}