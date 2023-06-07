import 'package:flutter/material.dart';

import '../models/park.dart';
import 'park_id_widget.dart';

class ParkWidget extends StatelessWidget {
  final Park park;

  const ParkWidget({required this.park, super.key});

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: const EdgeInsets.all(10),
      decoration: BoxDecoration(
        color: Colors.grey.shade900,
        border: Border.all(
            color: park.detection == null || park.detection! == false
                ? Colors.green
                : Colors.red,
            width: 10),
        borderRadius: const BorderRadius.all(Radius.circular(10)),
      ),
      child: Center(
        child: park.detection != null && park.detection! == true
            ? Image.asset("assets/car2.png", fit: BoxFit.fill)
            : ParkIdWidget(park: park),
      ),
    );
  }
}
