<?php defined('BASEPATH') or exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel
{
    protected $_ci;
  
    public function __construct()
    {
        log_message('Debug', 'Spreadsheet class is loaded.');
        $this->_ci = &get_instance();
        $this->_ci->load->database();
    }

    public function getScholarship($status)
    {
        if($status == 'applicants'){
            return $this->_ci->db->get_where('tb_scholarship', ['status !=' => 2])->result();

        }else{
            return $this->_ci->db->get_where('tb_scholarship', ['status' => 2])->result();
        }
    }

    public function getUsers($status = 1)
    {
        $this->_ci->db->select('*');
        $this->_ci->db->from('tb_user a');
        $this->_ci->db->join('tb_auth b', 'a.user_id = b.user_id');
        $this->_ci->db->where(['b.is_deleted' => 0, 'b.role' => 2, 'active' => $status, 'name !=' => null, 'name !=' => '', 'email !=' => null, 'email !=' => '']);
        $this->_ci->db->order_by('a.name ASC');
        return $this->_ci->db->get()->result();
    }

    public function exportScholarship($status)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => array('argb' => 'FF4F81BD')
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        $sheet->setCellValue('A1', "Daftar peserta pendaftaran YBB Foundation Scholarship Programs 2021"); // Set kolom A1
        $sheet->mergeCells('A1:O1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "No."); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "Tgl. Pendaftaran"); // Set kolom E3
        $sheet->setCellValue('C3', "Status Pendaftaran"); // Set kolom E3
        $sheet->setCellValue('D3', "Kode Pendaftaran"); // Set kolom B3
        $sheet->setCellValue('E3', "Nama Lengkap"); // Set kolom C3
        $sheet->setCellValue('F3', "Tanggal Lahir"); // Set kolom D3
        $sheet->setCellValue('G3', "Nomor Whatsapp"); // Set kolom E3
        $sheet->setCellValue('H3', "Alamat"); // Set kolom E3
        $sheet->setCellValue('I3', "Jurusan/Prodi/Fakultas"); // Set kolom E3
        $sheet->setCellValue('J3', "Sekolah/Universitas"); // Set kolom E3
        $sheet->setCellValue('K3', "GPA saat ini"); // Set kolom E3
        $sheet->setCellValue('L3', "Semester"); // Set kolom E3
        $sheet->setCellValue('M3', "Tentang"); // Set kolom E3
        $sheet->setCellValue('N3', "Mimpi dan cara mewujudkannya"); // Set kolom E3
        $sheet->setCellValue('O3', "Pengalaman organisasi dan relawan"); // Set kolom E3


        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        $sheet->getStyle('G3')->applyFromArray($style_col);
        $sheet->getStyle('H3')->applyFromArray($style_col);
        $sheet->getStyle('I3')->applyFromArray($style_col);
        $sheet->getStyle('J3')->applyFromArray($style_col);
        $sheet->getStyle('K3')->applyFromArray($style_col);
        $sheet->getStyle('L3')->applyFromArray($style_col);
        $sheet->getStyle('M3')->applyFromArray($style_col);
        $sheet->getStyle('N3')->applyFromArray($style_col);
        $sheet->getStyle('O3')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $scholarship = $this->getScholarship($status);

        if(!empty($scholarship)){
            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
            foreach ($scholarship as $data) { // Lakukan looping pada variabel siswa
                $sheet->setCellValue('A'.$numrow, $no);
                $sheet->setCellValue('B'.$numrow, date("d M Y", $data->created_at));

                switch ($data->status) {
                    case 1:
                        $class = 'warning';
                        $status = 'Menunggu verifikasi berkas';
                        break;

                    case 2:
                        $class = 'success';
                        $status = 'Lolos tahap wawancara';
                        break;

                    case 3:
                        $class = 'danger';
                        $status = 'Berkas Ditolak';
                        break;
                    
                    default:
                        $class = 'secondary';
                        $status = 'unverified';
                        break;
                }

                $sheet->setCellValue('C'.$numrow, $status);
                $sheet->setCellValue('D'.$numrow, $data->scholar_id);
                $sheet->setCellValue('E'.$numrow, $data->full_name);
                $sheet->setCellValue('F'.$numrow, date("d M Y", strtotime($data->date_birth)));
                $sheet->setCellValue('G'.$numrow, "62".$data->whatsapp_number);
                $sheet->setCellValue('H'.$numrow, $data->current_address);
                $sheet->setCellValue('I'.$numrow, $data->field_study);
                $sheet->setCellValue('J'.$numrow, $data->school);
                $sheet->setCellValue('K'.$numrow, $data->current_gpa);
                $sheet->setCellValue('L'.$numrow, "Semester ".$data->semester);
                $sheet->setCellValue('M'.$numrow, strip_tags($data->about));
                $sheet->setCellValue('N'.$numrow, strip_tags($data->dream_come));
                $sheet->setCellValue('O'.$numrow, strip_tags($data->volunteer));

            
                // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('J'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('K'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('L'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('M'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('N'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('O'.$numrow)->applyFromArray($style_row);

            
                $no++; // Tambah 1 setiap kali looping
                $numrow++; // Tambah 1 setiap kali looping
            }
        }else{
            $sheet->setCellValue('A4', "belum ada data"); // Set kolom A1
            $sheet->mergeCells('A4:O4'); // Set Merge Cell pada kolom A1 sampai E1
            $sheet->getStyle('A4')->getFont()->setBold(true); // Set bold kolom A1
        }

            // Set width kolom
        $sheet->getColumnDimension('A')->setAutoSize(true); // Set width kolom A
        $sheet->getColumnDimension('B')->setAutoSize(true); // Set width kolom B
        $sheet->getColumnDimension('C')->setAutoSize(true); // Set width kolom C
        $sheet->getColumnDimension('D')->setAutoSize(true); // Set width kolom D
        $sheet->getColumnDimension('E')->setAutoSize(true); // Set width kolom E
        $sheet->getColumnDimension('F')->setAutoSize(true); // Set width kolom E
        $sheet->getColumnDimension('G')->setAutoSize(true); // Set width kolom E
        $sheet->getColumnDimension('H')->setAutoSize(true); // Set width kolom E
        $sheet->getColumnDimension('I')->setAutoSize(true); // Set width kolom E
        $sheet->getColumnDimension('J')->setAutoSize(true); // Set width kolom E
        $sheet->getColumnDimension('K')->setAutoSize(true); // Set width kolom E
        $sheet->getColumnDimension('L')->setAutoSize(true); // Set width kolom E
        $sheet->getColumnDimension('M')->setAutoSize(true); // Set width kolom E
        $sheet->getColumnDimension('N')->setAutoSize(true); // Set width kolom E
        $sheet->getColumnDimension('O')->setAutoSize(true); // Set width kolom E

    
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $title = "DataScholarship-".date("dMY").".xlsx";
        $sheet->setTitle($title);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$title.'"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function exportUsers($status)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => array('argb' => 'FF4F81BD')
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        $sheet->setCellValue('A1', "Daftar peserta pendaftaran YBB Foundation Scholarship Programs 2021"); // Set kolom A1
        $sheet->mergeCells('A1:O1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "No."); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "Tgl. Pendaftaran akun"); // Set kolom E3
        $sheet->setCellValue('C3', "Nama"); // Set kolom E3
        $sheet->setCellValue('D3', "Email"); // Set kolom B3
        $sheet->setCellValue('E3', "Jenis Kelamin"); // Set kolom C3


        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $scholarship = $this->getUsers($status);

        if(!empty($scholarship)){
            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
            foreach ($scholarship as $data) { // Lakukan looping pada variabel siswa
                $sheet->setCellValue('A'.$numrow, $no);
                $sheet->setCellValue('B'.$numrow, date("d M Y", $data->created_at));
                $sheet->setCellValue('C'.$numrow, $data->name);
                $sheet->setCellValue('D'.$numrow, $data->email);
                $sheet->setCellValue('E'.$numrow, $data->gender == 'male' ? 'Laki-laki' : ($data->gender == 'female' ? 'Perempuan' : '-'));

            
                // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
                $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);

            
                $no++; // Tambah 1 setiap kali looping
                $numrow++; // Tambah 1 setiap kali looping
            }
        }else{
            $sheet->setCellValue('A4', "belum ada data"); // Set kolom A1
            $sheet->mergeCells('A4:E4'); // Set Merge Cell pada kolom A1 sampai E1
            $sheet->getStyle('A4')->getFont()->setBold(true); // Set bold kolom A1
        }

            // Set width kolom
        $sheet->getColumnDimension('A')->setAutoSize(true); // Set width kolom A
        $sheet->getColumnDimension('B')->setAutoSize(true); // Set width kolom B
        $sheet->getColumnDimension('C')->setAutoSize(true); // Set width kolom C
        $sheet->getColumnDimension('D')->setAutoSize(true); // Set width kolom D
        $sheet->getColumnDimension('E')->setAutoSize(true); // Set width kolom E

    
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $title = "Data-Pengguna_".date("dMY").".xlsx";
        $sheet->setTitle($title);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$title.'"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
