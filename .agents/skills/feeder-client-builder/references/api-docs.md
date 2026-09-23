# Neo Feeder Web Service 2.0 API Reference

This document summarizes the available actions (`act`) in the Neo Feeder Web Service 2.0, as extracted from the official PDF and Postman documentation.

## Authentication & Introspection
*   **act**: `GetToken`
    *   **Request**: `act`, `username`, `password`
    *   **Response**: `token` (string)
*   **act**: `GetDictionary`
    *   **Request**: `token`, `fungsi` (e.g., "GetDetailMahasiswaLulusDO")
    *   **Response**: Describes the schema (primary keys, nullability, data types) of the requested function.

## Common Data Retrieval Actions
For these actions, standard request parameters apply: `act`, `token`, `filter`, `order`, `limit`, `offset`.

### Master Data (Referensi)
*   `GetProfilPT`: Data Perguruan Tinggi
*   `GetAgama`: Referensi Agama
*   `GetBentukPendidikan`: Referensi Bentuk Pendidikan
*   `GetLevelWilayah`, `GetNegara`, `GetWilayah`: Referensi Wilayah
*   `GetPekerjaan`, `GetPenghasilan`: Referensi Pekerjaan dan Penghasilan
*   `GetKebutuhanKhusus`: Referensi Kebutuhan Khusus
*   `GetJenjangPendidikan`: Referensi Jenjang Pendidikan
*   `GetAlatTransportasi`: Referensi Transportasi
*   `GetPembiayaan`: Referensi Pembiayaan
*   `GetJalurMasuk`: Referensi Jalur Masuk
*   `GetJenisPendaftaran`, `GetJenisKeluar`, `GetJenisEvaluasi`, `GetJenisSertifikasi`

### Mahasiswa (Students)
*   `GetListMahasiswa` / `GetBiodataMahasiswa`: Detailed biodata
*   `GetListRiwayatPendidikanMahasiswa`: Educational history (enrollments)
*   `GetListMahasiswaLulusDO`: Graduated / Dropped out students
*   `GetAktivitasKuliahMahasiswa`: Student's academic activities per semester
*   `GetListPrestasiMahasiswa`: Student achievements
*   `GetTranskripMahasiswa`: Academic transcripts
*   `GetKRSMahasiswa`: Course registrations (KRS)
*   `GetNilaiTransferPendidikanMahasiswa`: Transfer grades
*   `GetListBimbingMahasiswa`: Student supervision

### Dosen (Lecturers)
*   `GetListDosen` / `DetailBiodataDosen`: Detailed biodata
*   `GetListPenugasanDosen` / `GetListPenugasanSemuaDosen`: Lecturer assignments (homebase)
*   `GetAktivitasMengajarDosen`: Teaching activities
*   `GetRiwayatFungsionalDosen`, `GetRiwayatPangkatDosen`, `GetRiwayatPendidikanDosen`, `GetRiwayatSertifikasiDosen`, `GetRiwayatPenelitianDosen`: Lecturer history
*   `GetDosenPembimbing`: Supervisors

### Perkuliahan (Academics)
*   `GetProdi` / `GetAllProdi`: Study Programs
*   `GetMataKuliah` / `GetListMataKuliah` / `GetDetailMataKuliah`: Courses
*   `GetListKurikulum` / `GetDetailKurikulum` / `GetMatkulKurikulum`: Curriculums and mapping
*   `GetListKelasKuliah` / `GetDetailKelasKuliah`: Classes
*   `GetDosenPengajarKelasKuliah`: Lecturers teaching a class
*   `GetPesertaKelasKuliah`: Students enrolled in a class
*   `GetListNilaiPerkuliahanKelas`: Grades for a class
*   `GetListSkalaNilaiProdi`: Grading scale definition

### Count & Export Actions
For almost every `GetList...` or `Get...` action, there is a corresponding `GetCount...` action to get the total number of records (e.g., `GetCountMahasiswa`), and an `ExportData...` action.

## Data Manipulation (Insert/Update/Delete)
Most entities have corresponding `Insert`, `Update`, and `Delete` actions (e.g., `InsertKelasKuliah`, `UpdateKelasKuliah`, `DeleteKelasKuliah`).
*   **Insert**: Pass the `token` and the `record` containing the data payload.
*   **Update**: Pass the `token`, the `key` (primary key for the record to update), and the `record` (new data).
*   **Delete**: Pass the `token` and the `key`.

## Typical Integration Flow (PHP/CodeIgniter)
```php
// 1. Get Config and Token
$Conf = $this->feeder->get_data()->row();
$token = get_token($Conf);

// 2. Prepare Payload
$data_param = [
    'act' => 'GetListMahasiswa',
    'token' => $token,
    'filter' => "nim = '123456'",
    'limit' => 1,
    'offset' => 0
];

// 3. Send Request
$response = service_request($data_param, $Conf);
$data = json_decode(json_encode($response), true);

// 4. Handle Response
if ($data['error_code'] == 0) {
    // Success
    $mahasiswa = $data['data'];
} else {
    // Error
    $error_msg = $data['error_desc'];
}
```
