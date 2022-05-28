<?php

include("KontrakProses.php");

class TambahData implements KontrakProses
{
	private $tabelpasien;
	
	function TambahData()
	{
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "lp12"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array(); //instansi list untuk data Pasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}

	function tambahDataPasien($data)
	{
		try
		{
			$this->tabelpasien->open();
			$this->tabelpasien->addPasien($data);
			$this->tabelpasien->close();
		}
		catch (Exception $e)
		{
			echo "gagal menambahkan data!" . $e->getMessage(); 
		}
	}
	
	function hapusDataPasien($id)
	{
		try
		{
			$this->tabelpasien->open();
			$this->tabelpasien->deletePasien($id);
			$this->tabelpasien->close();
		}
		catch (Exception $e)
		{
			echo "gagal menghapus data!" . $e->getMessage(); 
		}
	}

	function ubahDataPasien($data)
	{
		try
		{
			$this->tabelpasien->open();
			$this->tabelpasien->updatePasien($data);
			$this->tabelpasien->close();
		}
		catch (Exception $e)
		{
			echo "gagal ubah data!" . $e->getMessage(); 
		}
	}
}
?>