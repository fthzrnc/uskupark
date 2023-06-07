import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../models/park.dart';
import '../models/park_manager.dart';
import 'park_widget.dart';

class ParkGridView extends StatelessWidget {
  final List<Park> parks;

  const ParkGridView({required this.parks, super.key});

  @override
  Widget build(BuildContext context) {
    return parks.isEmpty
        ? const Center(child: CircularProgressIndicator())
        : RefreshIndicator(
            onRefresh: () async {
              await Provider.of<ParkManager>(context, listen: false)
                  .refreshParks();
            },
            child: ListView(
              physics: const BouncingScrollPhysics(),
              children: [
                Padding(
                  padding: const EdgeInsets.all(10.0),
                  child: Center(
                      child: Text(
                    availableSlotText,
                    style: const TextStyle(fontSize: 19),
                  )),
                ),
                GridView.count(
                  shrinkWrap: true,
                  physics:
                      const NeverScrollableScrollPhysics(), // aşağı yukarı yaparken mal mavi şeyi engelliyor
                  crossAxisCount: 2, // yanyana kaç tane
                  childAspectRatio: 2 / 3, // dikdörtgenin oranı
                  children: parkWidgets,
                ),
              ],
            ),
          );
  }

  String get availableSlotText {
    return parks
            .where((element) =>
                element.detection == false || element.detection == null)
            .toList()
            .length
            .toString() +
        " Available Slot(s)";
  }

  List<ParkWidget> get parkWidgets {
    List<ParkWidget> widgets = [];

    for (final park in parks) {
      widgets.add(ParkWidget(park: park));
    }

    return widgets;
  }
}
