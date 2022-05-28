<?php

include("KontrakView.php");
include("presenter/ProsesPasien.php");
include("presenter/TambahData.php");

class FormPasien implements KontrakView
{
	private $tpl;
	private $prosespasien;
	private $prosespasien2;
	
	function FormPasien()
	{
		$this->prosespasien = new TambahData();
		$this->prosespasien2 = new ProsesPasien();
	}

	function tampil()
	{	
		$this->tpl = new Template("templates/tambah.html");

		if(isset($_POST['tambah']))
		{
			$this->prosespasien->tambahDataPasien($_POST);
            		header("location:index.php");
		}

		if(isset($_GET['id_hapus']))
		{
			$id = $_GET['id_hapus'];
			$this->prosespasien->hapusDataPasien($id);
            		header("location:index.php");
		}

		if(isset($_POST['tambah']))
		{
			$this->tpl->replace("VALUE_NIK", "");
			$this->tpl->replace("VALUE_NAMA", "");
			$this->tpl->replace("VALUE_TEMPAT", "");
			$this->tpl->replace("VALUE_TL", "");
			$this->tpl->replace("VALUE_GENDER", "");
			$this->tpl->replace("VALUE_EMAIL", "");
			$this->tpl->replace("VALUE_TELEPON", "");
			$this->tpl->replace("VALUE_ID", "");

			$this->tpl->replace("VALUE_BUTTON", "tambah");
		}

		$this->tpl->write();
	}


}

?>
