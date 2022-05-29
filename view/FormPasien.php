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

		if(isset($_POST['submit']))
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
		$this->tpl->write();
	}
}

?>
