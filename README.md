---

# NightPVP

🌌 **NightPVP** is a PocketMine-MP plugin that restricts PvP (player versus player) to nighttime only, adding a strategic and immersive twist to your Minecraft server!

[![Poggit](https://poggit.pmmp.io/shield.state/NightPVP)](https://poggit.pmmp.io/p/NightPVP) [![Download](https://poggit.pmmp.io/shield.dl.total/NightPVP)](https://poggit.pmmp.io/p/NightPVP)

---

## ❗ Requirements

- **PocketMine-MP API**: 5.0.0 or higher  
- **PHP**: 8.0 or higher  

---

## ❓ How to Install

1. Download the latest `.phar` from the [Releases](https://github.com/Estem01/NightPvP/releases) page or [Poggit](https://poggit.pmmp.io/p/NightPVP).  
2. Place the `.phar` file in your server's `plugins` folder.  
3. Start or restart your server to generate the `config.yml`.  
4. Edit `config.yml` in `plugins/NightPVP` to configure worlds, messages, and time settings.  
5. Enjoy! PvP is now restricted to nighttime in the specified worlds.

---

## ✨ Features

- **Nighttime PvP**: Limits player combat to nighttime (or custom time periods).  
- **World-Specific Rules**: Apply PvP restrictions only to selected worlds.  
- **Customizable Messages**: Choose between pop-ups or chat messages with editable text.  
- **Flexible Time Settings**: Adjust when PvP starts and ends using in-game ticks.  
- **Bypass Permissions**: Allow specific players to ignore restrictions.  
- **Optional Logging**: Track blocked PvP attempts in the server console.  

---

## 📜 Versions

- **Version 1.3.2** (March 28, 2025)  
  - Updated to PocketMine-MP API 5.0.0.  
  - Added `nightpvp.always.on` permission.  
  - Enhanced stability and compatibility.  

- **Version 1.2**  
  - Fixed bugs with PvP restriction enforcement.  

- **Version 1.1**  
  - Fixed daytime PvP bugs.  
  - Added customizable PvP enabled message.  

- **Version 1.0**  
  - Initial release with nighttime PvP restriction.  

---

## ⚙️ Configuration

The default `config.yml` is generated in `plugins/NightPVP`. Customize it to fit your server:

```yaml
# Worlds where NightPVP is active
allowed-worlds: 
  - "world"
  - "arena"

# Error message type (popup or message)
error-message-type: "popup"

# PvP restriction message
day-no-pvp: "§cYou can only fight during the night!"

# Custom world time settings
night-start-time: 13000  # Minecraft night start time
night-end-time: 23000    # Minecraft night end time

# Enable/disable world time check
enable-world-time-check: true

# Enable plugin logger
enable-logger: false
```

### Options Explained
- `allowed-worlds`: Worlds where PvP is restricted to nighttime.  
- `error-message-type`: "popup" or "message" for PvP block notifications.  
- `day-no-pvp`: Message displayed when PvP is blocked (supports `§` color codes).  
- `night-start-time` / `night-end-time`: PvP time range in ticks (0-23999).  
- `enable-world-time-check`: Set to `false` to disable time-based restrictions.  
- `enable-logger`: Set to `true` to log blocked PvP attempts.  

---

## 🔒 Permissions

- `nightpvp.bypass`  
  - **Description**: Allows players to bypass PvP time restrictions and fight anytime.  
  - **Default**: `op` (operators only)  

- `nightpvp.always.on`  
  - **Description**: Enables PvP at all times, ignoring night restrictions.  
  - **Default**: `false` (disabled for all)  

---

## ⭐ Join Our Community

Get support, updates, and share your ideas on our Discord server!  
👉 **[Discord](https://discord.gg/pyHvRwkJC2)**  

---

## 🛠️ Contributing

Want to improve NightPVP?  
- Report bugs or suggest features in the [Issues](https://github.com/Estem01/NightPvP/issues) tab.  
- Submit code enhancements via [Pull Requests](https://github.com/Estem01/NightPvP/pulls).  

Check the [commits](https://github.com/Estem01/NightPvP/commits/main) for the latest changes!

---

## 📝 License

This project is licensed under the [Apache License](https://github.com/Estem01/NightPvP/blob/main/LICENSE).  

## 👥 Authors

- [Estem01](https://github.com/Estem01)  
- [henrythierrydev](https://github.com/henrythierrydev)  
- [UnknownNull](https://github.com/UnknownNull)

---
