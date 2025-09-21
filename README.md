# EmpyrionExplorationDatabase
Personal Database for your Empyrion exploration Journey.

# Concept
- Add important entries yourself.
- Track quests, enemy spawns, useful locations etc.
- If distances to systems are known, provide a jump route respecting range of the vessel

## Needed Tables:
- Location
    - Name
    - Type (System, Sector, Planet)
    - Type
    - Location ?
- Object
    - LocationID
    - Type (Quest/OreDeposit/Asteroid/etc.)
    - Notes
- Distance
    - FromID
    - ToID
    - Distance (< 110 ly)