<?php

interface KontrakPresenter
{
	public function prosesDataPasien();
	// public function tambahDataPasien($data);
	// public function hapusDataPasien($id);
	// public function ubahDataPasien();
	public function getId($i);
	public function getNik($i);	
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getPhone($i);
	public function getSize();
}

?>