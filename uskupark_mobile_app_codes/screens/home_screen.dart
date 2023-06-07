import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../models/park_manager.dart';
import 'home_app_bar.dart';
import 'park_grid_view.dart';

class HomeScreen extends StatefulWidget {
  // stable
  const HomeScreen({super.key});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  @override
  void initState() {
    Provider.of<ParkManager>(context, listen: false).refreshParks();

    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Consumer<ParkManager>(builder: (context, manager, child) {
      return Scaffold(
        appBar: const HomeAppBar(),
        body: [
          ParkGridView(parks: manager.getFloor("A")),
          ParkGridView(parks: manager.getFloor("B")),
          ParkGridView(parks: manager.getFloor("C")),
        ][manager.selectedFloorIndex],
        bottomNavigationBar: BottomNavigationBar(
          backgroundColor: const Color.fromARGB(255, 9, 179, 173),
          fixedColor: const Color.fromARGB(255, 255, 255, 255),
          currentIndex: manager.selectedFloorIndex,
          onTap: (index) => manager.selectFloor(index),
          items: const [
            BottomNavigationBarItem(
                icon: Icon(Icons.directions_car), label: "Floor 1"),
            BottomNavigationBarItem(
                icon: Icon(Icons.directions_car), label: "Floor 2"),
            BottomNavigationBarItem(
                icon: Icon(Icons.directions_car), label: "Floor 3")
          ],
        ),
      );
    });
  }
}
