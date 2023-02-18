<?php


class Equipement
{
    private $id;
    private $name;
    private $model;
    private $manufactureDate;
    private $serialNumber;
    private $process;
    public function __construct($ID, $name, $model, $manufactureDate, $serialNumber, $process)
    {
        $this->id = $ID;
        $this->name = $name;
        $this->model = $model;
        $this->manufactureDate = $manufactureDate;
        $this->serialNumber = $serialNumber;
        $this->process = $process;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function setModel($model)
    {
        $this->model = $model;
    }
    public function getManufactureDate()
    {
        return $this->manufactureDate;
    }
    public function setManufactureDate($manufactureDate)
    {
        $this->manufactureDate = $manufactureDate;
    }
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }
    public function getProcess()
    {
        return $this->process;
    }
    public function setProcess($process)
    {
        $this->process = $process;
    }
}
