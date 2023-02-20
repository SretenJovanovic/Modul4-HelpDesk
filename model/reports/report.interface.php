<?php
interface Report {
    public function getId();
    public function setId($id);
    public function getUser();
    public function setUser(User $user);
    public function getEquipement();
    public function setEquipement(Equipement $equipement);
    public function getDescription();
    public function setDescripton($description);
    public function getReportDate();
    public function getStatus();
    public function setStatus();
    public function getFixedDate();
    public function setFixedDate($fixedDate);
}