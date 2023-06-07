import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import 'models/park_manager.dart';
import 'screens/home_screen.dart';

void main() => runApp(
      ChangeNotifierProvider(
        create: (context) => ParkManager(),
        child: const MyApp(),
      ),
    );

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: "uskupark",
      theme: ThemeData(
        appBarTheme: const AppBarTheme(
          backgroundColor: Color.fromARGB(255, 9, 179, 173),
        ),
      ),
      home: const HomeScreen(),
    );
  }
}
