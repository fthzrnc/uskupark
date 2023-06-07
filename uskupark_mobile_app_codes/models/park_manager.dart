import 'package:flutter/material.dart';
import 'package:mysql1/mysql1.dart';

import 'park.dart';

class ParkManager extends ChangeNotifier {
  int _selectedFloorIndex = 0;

  int get selectedFloorIndex => _selectedFloorIndex;
  selectFloor(int index) {
    _selectedFloorIndex = index;
    notifyListeners();
  }

  List<Park> _parks = [];
  MySqlConnection? _databaseConnection;

  List<Park> getFloor(String id) {
    List<Park> parksById = [];

    for (final park in _parks) {
      if (park.sensorId.startsWith(id)) {
        parksById.add(park);
      }
    }

    return parksById;
  }

  Future<void> refreshParks() async {
    _parks = await _fetchDataFromDatabase();
    notifyListeners();
  }

  Future<void> _connectDatabase() async {
    if (_databaseConnection != null) return;

    final settings = ConnectionSettings(
      host: '31.223.68.41',
      port: 3306,
      user: 'user',
      password: 'fatih123',
      db: 'arduino_db',
    );

    _databaseConnection = await MySqlConnection.connect(settings);
  }

  Future<List<Park>> _fetchDataFromDatabase() async {
    // return [
    //   Park(sensorId: "A1", detection: false),
    //   Park(sensorId: "A2", detection: false),
    //   Park(sensorId: "A3", detection: true),
    //   Park(sensorId: "A4", detection: true),
    //   Park(sensorId: "B1", detection: true),
    //   Park(sensorId: "B2", detection: true),
    //   Park(sensorId: "B3", detection: false),
    //   Park(sensorId: "B4", detection: false),
    //   Park(sensorId: "C1", detection: false),
    //   Park(sensorId: "C2", detection: false),
    //   Park(sensorId: "C3", detection: false),
    //   Park(sensorId: "C4", detection: true),
    // ]; // database çalışınca kaldırılıcak, test amaçlı

    await _connectDatabase();

    final results =
        await _databaseConnection?.query("SELECT * FROM sensor_data;");

    if (results == null || results.isEmpty) return [];

    List<Park> parks = [];

    for (final row in results) {
      final sensorId = row[0];
      final detection = row[1];

      bool? detectionBool;

      if (detection == "YES") {
        detectionBool = true;
      } else if (detection == "NO") {
        detectionBool = false;
      } else {
        detectionBool = null;
      }

      parks.add(Park(sensorId: sensorId, detection: detectionBool));
    }

    return parks;
  }
}
