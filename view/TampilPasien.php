<?php

include("KontrakView.php");
include("presenter/ProsesPasien.php");
include("presenter/TambahData.php");

class TampilPasien implements KontrakView
{
	private $prosespasien;
	private $tpl;

	function TampilPasien()
	{
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) 
		{
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getPhone($i) . "</td>
			<td>
				<a href='proses.php?id_update=" . $this->prosespasien->getId($i) . "' class='btn btn-warning' '>Ubah</a>
        		<a href='proses.php?id_hapus=" . $this->prosespasien->getId($i) . "' class='btn btn-danger' '>Hapus</a>
			</td>";
		}
		$this->tpl = new Template("templates/skin.html");
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->write();
	}
}

?>