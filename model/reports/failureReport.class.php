<?php

require_once 'report.interface.php';

class FailureReport implements Report
{
    private $id;
    private User $user;
    private Equipement $equipement;
    private $description;
    private $reportDate;
    private $status = false;
    private $fixedDate;

    public function __construct($id, User $user, Equipement $equipement, $description, $reportDate, $fixedDate = null, $status)
    {
        $this->id = $id;
        $this->user = $user;
        $this->equipement = $equipement;
        $this->description = $description;
        $this->reportDate = $reportDate;
        $this->fixedDate = $fixedDate;
        $this->status = $status;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser(User $user)
    {
        $this->user = $user;
    }
    public function getEquipement()
    {
        return $this->equipement;
    }
    public function setEquipement(Equipement $equipement)
    {
        $this->equipement = $equipement;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescripton($description)
    {
        $this->description = $description;
    }
    public function getReportDate()
    {
        $orgDate = $this->reportDate;
        $newDate = date("d-m-Y h:i:s", strtotime($orgDate));
        return $newDate;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus()
    {
        $this->status = !$this->status;
    }
    public function getFixedDate()
    {
        $orgDate = $this->fixedDate;
        $newDate = date("d-m-Y h:i:s", strtotime($orgDate));
        return $newDate;
    }
    public function setFixedDate($fixedDate)
    {
        return $this->fixedDate = $fixedDate;
    }
}
