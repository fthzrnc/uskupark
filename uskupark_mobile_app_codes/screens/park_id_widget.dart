import 'package:flutter/material.dart';

import '../models/park.dart';

class ParkIdWidget extends StatelessWidget {
  final Park park;

  const ParkIdWidget({required this.park, super.key});

  @override
  Widget build(BuildContext context) {
    return Container(
      decoration: BoxDecoration(
        shape: BoxShape.circle,
        border: Border.all(width: 3, color: Colors.white),
      ),
      child: Padding(
        padding: const EdgeInsets.all(10),
        child: Text(
          park.sensorId,
          style: const TextStyle(color: Colors.white, fontSize: 50),
        ),
      ),
    );
  }
}
