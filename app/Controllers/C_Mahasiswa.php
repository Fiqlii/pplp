<?php
namespace App\Controllers;
use App\Models\M_Mahasiswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_Mahasiswa extends BaseController
{
    protected $M_Mahasiswa;
    public function __construct()
    {
        $this->M_Mahasiswa = new M_Mahasiswa();
    }
    public function index()
    {
        $mahasiswa = new M_Mahasiswa();
        // $search = $this->request->getGet('cari');
        // if($search){
            // $data = $this->M_Mahasiswa->getSearch($search);
        // }else{
            $data = $mahasiswa->paginate(4, 'artikel');
            $pager = $mahasiswa->pager;
            // $data =[
            //         'artikel' => $data->paginate(10, 'artikel'), //10 data per halaman
            //         'pager' => $data->pager,
            //     ];
        // }
        // return view('V_Mahasiswa', $data);
        // $data =[
            // 'artikel' => $mahasiswa->paginate(5, 'artikel'), //10 data per halaman
            // 'pager' => $mahasiswa->pager,
        // ];
        // return view('V_Mahasiswa', $data);
        return view('V_Mahasiswa', compact('data', 'pager'));
    }


    public function create()
    {
        return view('V_Create_Mahasiswa');
    }
    public function save()
    {
        $data['Nama'] = $this->request->getPost('Nama');
        $data['Nim'] = $this->request->getPost('Nim');
        $data['Umur'] = $this->request->getPost('Umur');
        $this->M_Mahasiswa->saveMahasiswa($data);
        return redirect()->to('/mahasiswa');
    }
    public function delete($id)
    {
        $this->M_Mahasiswa->delete($id);
        return redirect()->to('/mahasiswa');
    }
    public function edit($Nim)
    {
        // $model = new M_Mahasiswa();
        // $data = $model->Detail($Nim);
        // return view('V_Edit', compact('data'));
        $mahasiswa = new M_Mahasiswa();
        $data['mahasiswa'] = $mahasiswa->Detail($Nim);
        return view('V_Edit', $data);
    }
    public function Detail($Nim)
    {
        // DD($Nim);
        $mahasiswa = $this->M_Mahasiswa->Detail($Nim);
        return view('V_ViewDetail', compact('mahasiswa'));
    }
    public function updated ()
    {
        $data = [
            'Nim' => $this->request->getPost('Nim'),
            'Nama' => $this->request->getPost('Nama'),
            'Umur' => $this->request->getPost('Umur')
        ];
    
        $this->M_Mahasiswa->updated($data);
        return redirect()->to('/mahasiswa');
    }

    public function simpanExcel()
    {
        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }
            $NILAIUTS = (float)$row[3];
            $NILAIUAS = (float)$row[4];
            $NILAIAKHIR = $NILAIUTS * 0.4 + $NILAIUAS * 0.6;
            $data[$x][5] = $NILAIAKHIR;
        }
        print_r($data);
        $this->exportFile($data);
        return redirect()->to('/mahasiswa');
    }

    public function exportFile($data)
    {
        $spreadsheet = new Spreadsheet();

        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->setTitle('Data Impor');

        $worksheet->setCellValue('A1', 'NIM');
        $worksheet->setCellValue('B1', 'NAMA');
        $worksheet->setCellValue('C1', 'UMUR');
        $worksheet->setCellValue('D1', 'NILAI UTS');
        $worksheet->setCellValue('E1', 'NILAI UAS');
        $worksheet->setCellValue('F1', 'NILAI AKHIR');

        $rowIndex = 1;

        foreach ($data as $row) {
            $columnIndex = 1;

            foreach ($row as $cellValue) {
                $worksheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellValue);
                $columnIndex++;
            }

            $rowIndex++;
        }

        $writer = new Xlsx($spreadsheet);

        // Menyimpan file Excel
        $filename = 'hasil.xlsx';
        $writer->save($filename);
    }
    
}