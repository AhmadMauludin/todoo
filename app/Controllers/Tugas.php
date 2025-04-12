<?php

namespace App\Controllers;

use App\Models\TugasModel;
use CodeIgniter\Controller;

class Tugas extends Controller
{
    protected $tugasModel;

    public function __construct()
    {
        $this->tugasModel = new TugasModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 10; // Jumlah data per halaman

        if ($keyword) {
            $tugas = $this->tugasModel->search($keyword, $perPage);
        } else {
            $tugas = $this->tugasModel->paginate($perPage);
        }

        $data = [
            'title'  => 'Data tugas',
            'tugas' => $tugas,
            'pager'  => $this->tugasModel->pager, // Untuk pagination
            'keyword' => $keyword
        ];
        return view('tugas/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah tugas';
        return view('tugas/create', $data);
    }

    public function store()
    {
        $model = new TugasModel();
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/tugas', $fileName);
        } else {
            $fileName = null;
        }

        $model->save([
            'tugas' => $this->request->getPost('tugas'),
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu' => $this->request->getPost('waktu'),
            'status' => $this->request->getPost('status'),
            'foto' => $fileName
        ]);
        return redirect()->to('/tugas');
    }

    public function edit($id)
    {
        $data['title']     = 'Edit tugas';
        $model = new TugasModel();
        $data['tugas'] = $model->find($id);
        return view('tugas/edit', $data);
    }

    public function update($id)
    {
        $model = new TugasModel();
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/tugas', $fileName);
        } else {
            $fileName = $this->request->getPost('old_foto');
        }

        $model->update($id, [
            'tugas' => $this->request->getPost('tugas'),
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu' => $this->request->getPost('waktu'),
            'status' => $this->request->getPost('status'),
            'foto' => $fileName
        ]);
        return redirect()->to('/tugas');
    }

    public function delete($id)
    {
        $model = new TugasModel();
        $tugas = $model->find($id);

        if ($tugas && $tugas['foto']) {
            unlink('uploads/tugas/' . $tugas['foto']);
        }

        $model->delete($id);
        return redirect()->to('/tugas');
    }
}
