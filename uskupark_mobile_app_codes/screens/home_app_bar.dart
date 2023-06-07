import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:url_launcher/url_launcher.dart';

import '../models/park_manager.dart';

class HomeAppBar extends StatelessWidget implements PreferredSizeWidget {
  const HomeAppBar({super.key});

  @override
  Widget build(BuildContext context) {
    return AppBar(
      title: Row(
        children: [
          Image.asset(
            "assets/logo.png",
            fit: BoxFit.fitHeight,
            height: 50,
          ),
          const Text('USKUPARK'),
        ],
      ),
      actions: <Widget>[
        IconButton(
          icon: const Icon(Icons.language),
          onPressed: () async {
            await launchUrl(
              Uri.parse('https://uskupark.net'),
              mode: LaunchMode.externalApplication,
            );
          },
        ),
        IconButton(
          icon: const Icon(
            Icons.refresh,
            color: Colors.white,
          ),
          onPressed: () {
            Provider.of<ParkManager>(context, listen: false).refreshParks();
          },
        ),
      ],
    );
  }

  @override
  Size get preferredSize => Size.fromHeight(AppBar().preferredSize.height);
}
