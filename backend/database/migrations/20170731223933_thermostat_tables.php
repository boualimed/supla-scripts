<?php

use suplascripts\database\migrations\Migration;
use suplascripts\models\thermostat\ThermostatRoom;
use suplascripts\models\User;

class ThermostatTables extends Migration
{
    public function change()
    {
        $this->createThermostatRoomsTable();
    }

    private function createThermostatRoomsTable()
    {
        $this->table(ThermostatRoom::TABLE_NAME)
            ->addColumn(ThermostatRoom::NAME, 'string', ['length' => 100])
            ->addColumn(ThermostatRoom::USER_ID, 'uuid')
            ->addColumn(ThermostatRoom::THERMOMETERS, 'text')
            ->addColumn(ThermostatRoom::HEATERS, 'text')
            ->addColumn(ThermostatRoom::COOLERS, 'text')
            ->addTimestamps(ThermostatRoom::CREATED_AT, ThermostatRoom::UPDATED_AT)
            ->addForeignKey(ThermostatRoom::USER_ID, User::TABLE_NAME, User::ID)
            ->create();
        $this->table(ThermostatRoom::TABLE_NAME)
            ->changeColumn(ThermostatRoom::ID, 'uuid')
            ->update();
    }
}
