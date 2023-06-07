class Park {
  final String sensorId; // can't be null always string type
  final bool? detection; // bool? for null

  Park({required this.sensorId, required this.detection}); // Constructor

  static final List<Park> samples = [
    Park(sensorId: "A1", detection: true),
    Park(sensorId: "A2", detection: false),
    Park(sensorId: "A3", detection: false),
    Park(sensorId: "A4", detection: true),
  ];
}
