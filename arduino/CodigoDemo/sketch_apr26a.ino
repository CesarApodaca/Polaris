#include <SoftwareSerial.h>
//SoftwareSerial BT1(3, 2); // RX | TX
int errorLED = 12;
String ssid     = "Cesar";  // SSID delwifi
String password = "zzzzzzzzzz"; // Circuits no usa password

String host     = "polaris.cageek.com.mx"; // URL
const int httpPort   = 80;
String uri     = "/space/recepcion.php?temp=2&humedad=2&candela=2&temppanel=2&presion=2&nivelpresion=2&lumens=2&voltaje=2&watt=2";

void setup()
  {  
    pinMode(errorLED, OUTPUT);
  Serial.begin(115200);
    // BT1.begin(115200);
   // Serial.println("AT");
   //BT1.print("AT");
    delay(5000);        // tiempo para que el ESP responda

    Serial.println("AT+CWMODE=3");
    delay(5000);
  //if (Serial.find("OK")) digitalWrite(errorLED, HIGH);  // Checa si el ESP funciona
    // Se conecta circuits al simulador de wifi
      // Se conecta circuits al simulador de wifi
  Serial.println("AT+CWJAP=\"" + ssid + "\",\"" + password + "\"");
  delay(5000);        // Esperar a que responda
// if (Serial.find("OK")) digitalWrite(errorLED, HIGH); // checar si funciona
  Serial.println("AT+CIPMUX=1");
  delay(5000);
 // if (Serial.find("OK")) digitalWrite(errorLED, HIGH); 
 Serial.println("AT+CIPSTART=\"TCP\",\"" + host + "\"," + httpPort);
  delay(10000);
  if (Serial.find("OK")) digitalWrite(errorLED, HIGH);
 //  Serial.println("AT+CIPSTART=\"TCP\",\"" + host + "\"," + httpPort);
 // delay(5000);        // Wait a little for the ESP to respond
//  if (Serial.find("OK")) digitalWrite(errorLED, HIGH); // check if the ESP is running well
  

    
  }
void loop()
  { 
String httpPacket = "GET " + uri + " HTTP/1.1\r\nHost: " + host + "\r\n\r\n";
  int length = httpPacket.length();
  
  // Send our message length
  Serial.print("AT+CIPSEND=");
  Serial.println(length);
  delay(20000); // Wait a little for the ESP to respond
 // if (Serial.find(">")) digitalWrite(errorLED, HIGH); // check if the ESP is running well */

  // Send our http request
  Serial.print(httpPacket);
  delay(20000); // Wait a little for the ESP to respond
 // if (Serial.find("SEND OK\r\n")) digitalWrite(errorLED, HIGH); // check if the ESP is running well
   }
