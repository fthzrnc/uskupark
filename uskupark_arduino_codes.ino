#include <Servo.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);
#include <SoftwareSerial.h>                                     //SoftwareSerial library.

String SSID = "FiberHGW_TP649A_2.4GHz";                                           //SSID of WiFi network.    
String password = "9Wb9ugPs";                                 //Password of WiFi network.
String ip = "31.223.68.41";                                    //IP Address
int rxPin = 10;                                                 //ESP8266 TX pin
int txPin = 11;                                                 //ESP8266 RX pin                                               //Infrared proximity sensor pin                                      
SoftwareSerial esp(rxPin, txPin);                               //Configuration of serial communication pins.

Servo myservo;

#define ir_enter 2
#define ir_back  4

#define ir_car1 5
#define ir_car2 6
#define ir_car3 7
#define ir_car4 8


int S1 = 0, S2 = 0, S3 = 0, S4 = 0;
int flag1 = 0, flag2 = 0;
int slot = 4;

void setup() {
  Serial.begin(9600);

  Serial.println("Started");
  esp.begin(115200);                                            
  esp.println("AT");                                            //Checks the module with 'AT' command.
  Serial.println("Checking for ESP8266...");
  while(!esp.find("OK")){                                       
    esp.println("AT");
    Serial.println("ESP8266 not found.");
  }
  Serial.println("ESP8266 found.");
  esp.println("AT+CWMODE=1");                                   //Sets the module as client.
  while(!esp.find("OK")){                                     
    esp.println("AT+CWMODE=1");
    Serial.println("Setting as client....");
  }
  Serial.println("Done.");
  Serial.println("Connecting to network...");
  esp.println("AT+CWJAP=\""+SSID+"\",\""+password+"\"");        //Connects to network.
  while(!esp.find("OK"));                                    
  Serial.println("Connected.");
  delay(2000);

  pinMode(ir_car1, INPUT);
  pinMode(ir_car2, INPUT);
  pinMode(ir_car3, INPUT);
  pinMode(ir_car4, INPUT);

  pinMode(ir_enter, INPUT);
  pinMode(ir_back, INPUT);

  myservo.attach(3);
  myservo.write(90);


  lcd.init();
  lcd.backlight();
  
  lcd.clear();
  lcd.setCursor (0, 0);
  lcd.print("   Today's Project  ");
  lcd.setCursor (0, 1);
  lcd.print("    Car  Parking  ");
  delay (3000);
  lcd.clear();

}

void loop() {

  

  Read_Sensor();


  lcd.setCursor (0, 0);
  if (S1 == 1) {
    lcd.print("A1:Full");
  }
  else {
    lcd.print("A1:Free");
  }

  lcd.setCursor (9, 0);
  if (S2 == 1) {
    lcd.print("A2:Full");
  }
  else {
    lcd.print("A2:Free");
  }

  lcd.setCursor (0, 1);
  if (S3 == 1) {
    lcd.print("A3:Full");
  }
  else {
    lcd.print("A3:Free");
  }

  lcd.setCursor (9, 1);
  if (S4 == 1) {
    lcd.print("A4:Full");
  }
  else {
    lcd.print("A4:Free");
  }

  if (digitalRead (ir_enter) == 0 && flag1 == 0) {
    if (slot > 0) {
      flag1 = 1;
      if (flag2 == 0) {
        myservo.write(180);
        slot = slot - 1;
      }
    } else {
 
      delay(1000);
    }
  }

  if (digitalRead (ir_back) == 0 && flag2 == 0) {
    flag2 = 1;
    if (flag1 == 0) {
      myservo.write(180);
      slot = slot + 1;
    }
  }

  if (flag1 == 1 && flag2 == 1) {
    delay (1000);
    myservo.write(90);
    flag1 = 0, flag2 = 0;
  }

  delay(1);
}

void Read_Sensor() {
  S1 = 0, S2 = 0, S3 = 0, S4 = 0;

  

  if (digitalRead(ir_car1) == 0) {
    S1 = 1;

    Serial.println("Connecting to server...");
    esp.println("AT+CIPSTART=\"TCP\",\""+ip+"\",8080");             //Connects to server.
    if(esp.find("Error")){                                        //Checks for connection error.
      Serial.println("AT+CIPSTART Error");
  }                                   
    Serial.println("Connected.");
    delay(500);


    String data = "GET http://31.223.68.41:8080/insert_data.php";     //Inserts data to SQL database.

    data += "?detection='YES'";
    data += "\r\n\r\n";

    

    esp.print("AT+CIPSEND=");
    esp.println(data.length() + 2);
    delay(500);

    if(esp.find(">")) {                                         

      esp.print(data);                                          //Sends data.
      esp.print("\r\n\r\n");
      Serial.println("Sending data...");
      Serial.println("Data sent.");
      Serial.println("Disconnected.");
      esp.println("AT+CIPCLOSE");                                   //Disconnecting...
      delay(500);
    }
  }

  else {

    Serial.println("Connecting to serverNO...");
    esp.println("AT+CIPSTART=\"TCP\",\""+ip+"\",8080");             //Connects to server.
    if(esp.find("Error")){                                        //Checks for connection error.
      Serial.println("AT+CIPSTART Error");
  }                                   
    Serial.println("ConnectedNO.");
    delay(500);

    String data = "GET http://31.223.68.41:8080/insert_data.php";     //Inserts data to SQL database.

    data += "?detection='NO'";
    data += "\r\n\r\n";

    esp.print("AT+CIPSEND=");
    esp.println(data.length() + 2);
    delay(500);

    if(esp.find(">")) {                                         

      esp.print(data);                                          //Sends data.
      esp.print("\r\n\r\n");
      Serial.println("Sending NO data...");
      Serial.println("NO Data sent.");
      Serial.println("Disconnected.");
      esp.println("AT+CIPCLOSE");                                   //Disconnecting...
      delay(500);

    }

  }
  if (digitalRead(ir_car2) == 0) {
    S2 = 1;

    Serial.println("Connecting to server2...");
    esp.println("AT+CIPSTART=\"TCP\",\""+ip+"\",8080");             //Connects to server.
    if(esp.find("Error")){                                        //Checks for connection error.
      Serial.println("AT+CIPSTART Error");
  }                                   
    Serial.println("Connected2.");
    delay(500);

    String data = "GET http://31.223.68.41:8080/insert_data2.php";     //Inserts data to SQL database.

    data += "?detection='YES'";
    data += "\r\n\r\n";

    

    esp.print("AT+CIPSEND=");
    esp.println(data.length() + 2);
    delay(500);

    if(esp.find(">")) {                                         

      esp.print(data);                                          //Sends data.
      esp.print("\r\n\r\n");
      Serial.println("Sending data2...");
      Serial.println("Data2 sent.");
      Serial.println("Disconnected.");
      esp.println("AT+CIPCLOSE");                                   //Disconnecting...
      delay(500); 

    }
  }

  else {

    Serial.println("Connecting to server2NO...");
    esp.println("AT+CIPSTART=\"TCP\",\""+ip+"\",8080");             //Connects to server.
    if(esp.find("Error")){                                        //Checks for connection error.
      Serial.println("AT+CIPSTART Error");
  }                                   
    Serial.println("Connected2NO.");
    delay(500);

    String data = "GET http://31.223.68.41:8080/insert_data2.php";     //Inserts data to SQL database.

    data += "?detection='NO'";
    data += "\r\n\r\n";

    esp.print("AT+CIPSEND=");
    esp.println(data.length() + 2);
    delay(500);

    if(esp.find(">")) {                                         

      esp.print(data);                                          //Sends data.
      esp.print("\r\n\r\n");
      Serial.println("Sending NO data2...");
      Serial.println("NO Data2 sent.");
      Serial.println("Disconnected.");
      esp.println("AT+CIPCLOSE");                                   //Disconnecting...
      delay(500); 

    }
  }  

  
  if (digitalRead(ir_car3) == 0) {
    S3 = 1;

    Serial.println("Connecting to server3...");
    esp.println("AT+CIPSTART=\"TCP\",\""+ip+"\",8080");             //Connects to server.
    if(esp.find("Error")){                                        //Checks for connection error.
      Serial.println("AT+CIPSTART Error");
  }                                   
    Serial.println("Connected3.");
    delay(500);

    String data = "GET http://31.223.68.41:8080/insert_data3.php";     //Inserts data to SQL database.

    data += "?detection='YES'";
    data += "\r\n\r\n";

    

    esp.print("AT+CIPSEND=");
    esp.println(data.length() + 2);
    delay(500);

    if(esp.find(">")) {                                         

      esp.print(data);                                          //Sends data.
      esp.print("\r\n\r\n");
      Serial.println("Sending data3...");
      Serial.println("Data3 sent.");
      Serial.println("Disconnected.");
      esp.println("AT+CIPCLOSE");                                   //Disconnecting...
      delay(500);

    }
  }

  else {

    Serial.println("Connecting to server3NO...");
    esp.println("AT+CIPSTART=\"TCP\",\""+ip+"\",8080");             //Connects to server.
    if(esp.find("Error")){                                        //Checks for connection error.
      Serial.println("AT+CIPSTART Error");
  }                                   
    Serial.println("Connected3NO.");
    delay(500);

    String data = "GET http://31.223.68.41:8080/insert_data3.php";     //Inserts data to SQL database.

    data += "?detection='NO'";
    data += "\r\n\r\n";

    esp.print("AT+CIPSEND=");
    esp.println(data.length() + 2);
    delay(500);

    if(esp.find(">")) {                                         

      esp.print(data);                                          //Sends data.
      esp.print("\r\n\r\n");
      Serial.println("Sending NO data3...");
      Serial.println("NO Data3 sent.");
      Serial.println("Disconnected.");
      esp.println("AT+CIPCLOSE");                                   //Disconnecting...
      delay(500); 

    }
  }
  if (digitalRead(ir_car4) == 0) {
    S4 = 1;

    Serial.println("Connecting to server4...");
    esp.println("AT+CIPSTART=\"TCP\",\""+ip+"\",8080");             //Connects to server.
    if(esp.find("Error")){                                        //Checks for connection error.
      Serial.println("AT+CIPSTART Error");
  }                                   
    Serial.println("Connected4.");
    delay(500);

    String data = "GET http://31.223.68.41:8080/insert_data4.php";     //Inserts data to SQL database.

    data += "?detection='YES'";
    data += "\r\n\r\n";

    

    esp.print("AT+CIPSEND=");
    esp.println(data.length() + 2);
    delay(500);

    if(esp.find(">")) {                                         

      esp.print(data);                                          //Sends data.
      esp.print("\r\n\r\n");
      Serial.println("Sending data4...");
      Serial.println("Data4 sent.");
      Serial.println("Disconnected.");
      esp.println("AT+CIPCLOSE");                                   //Disconnecting...
      delay(500); 

    }
  }

  else {

    Serial.println("Connecting to server4NO...");
    esp.println("AT+CIPSTART=\"TCP\",\""+ip+"\",8080");             //Connects to server.
    if(esp.find("Error")){                                        //Checks for connection error.
      Serial.println("AT+CIPSTART Error");
  }                                   
    Serial.println("Connected4NO.");
    delay(500);

    String data = "GET http://31.223.68.41:8080/insert_data4.php";     //Inserts data to SQL database.

    data += "?detection='NO'";
    data += "\r\n\r\n";

    esp.print("AT+CIPSEND=");
    esp.println(data.length() + 2);
    delay(500);

    if(esp.find(">")) {                                         

      esp.print(data);                                          //Sends data.
      esp.print("\r\n\r\n");
      Serial.println("Sending NO data4...");
      Serial.println("NO Data4 sent.");
      Serial.println("Disconnected.");
      esp.println("AT+CIPCLOSE");                                   //Disconnecting...
      delay(500);

    }
  }

}
