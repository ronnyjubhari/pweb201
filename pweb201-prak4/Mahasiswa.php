<?php
  /**
   class model data Mahasiswa
   */
  class Mahasiswa
  {
    public $nim;
    public $nama;
    public $tanggalmasuk;
    public $email;
    public $jk;
    public $dosen_pa;
    public $nidn_pa;


    public function Mahasiswa($nim)
    {
      $this->nim = $nim;
      $this->initMahasiswa();
    }


    private function initMahasiswa()
    {
      $listmhs = new Daftar_mahasiswa();
      $mhs = $listmhs->getMahasiswaByNIM($this->nim);

      $this->nama = $mhs['nama'];
      $this->tanggalmasuk = $mhs['tanggal_masuk'];
      $this->email = $mhs['email'];
      $this->jk = $this->getJenisKelamin($mhs['lp']);

      $this->dosen_pa = new Dosen($mhs['dosen_pa']);
    }


    private function getJenisKelamin( $kodelp )
    {
      $jk = [ 'L' => ['kode' => 'L', 'gender' => 'Laki-laki' ],
              'P' => ['kode' => 'P', 'gender' => 'Perempuan' ] ];
      return $jk[ $kodelp ];
    }

    public function getMahasiswaFromPA()
    {
      $listmhs = new Daftar_mahasiswa();
      $mhs = $listmhs->getMahasiswaByPA($this->dosen_pa->nidn);

      return $mhs;
    }
  }//end class
?>
