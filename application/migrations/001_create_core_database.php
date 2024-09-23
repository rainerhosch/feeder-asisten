<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

/**
 *  File Name             : 001_create_core_database.php
 *  File Type             : Migration
 *  File Package          : CI_Migration
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 20/09/2022
 *  Quots of the code     : 'Pekerjaan akan terasa mudah, jika tidak dikerjakan.'
 */
class Migration_create_core_database extends CI_Migration
{
    public function up()
    {
        #### TRANSACTION TABLE *************************************************

        /*
        * tbl tbl_kurikulum
        */
        // $this->dbforge->add_field([
        //     'id' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //     ],
        //     'id_prodi' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //     ],
        //     'id_semester' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //     ],
        //     'nama_kurikulum' => [
        //         'type' => 'VARCHAR',
        //         'constraint' => '128',
        //     ],
        //     'jumlah_sks_lulus' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //     ],
        //     'jumlah_sks_wajib' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //     ],
        //     'jumlah_sks_pilihan' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //     ]
        // ]);

        // $this->dbforge->add_key('id', TRUE);
        // $this->dbforge->add_key('id_prodi');
        // $this->dbforge->create_table('tbl_kurikulum');

        /*
        * tbl tbl_mata_kuliah_kurikulum
        */
        /*
        * tbl tbl_semester
        */
        /*
        * tbl tbl_semester
        */
        /*
        * tbl tbl_list_ujian_mahasiswa
        */
        /*
        * tbl tbl_ajar_dosen
        */
        /*
        * tbl tbl_dosen
        */
        /*
        * tbl tbl_mahasiswa
        */

        /*
        * tbl tbl_matakuliah_kurikulum
        */

        #### MASTER TABLE ******************************************************
        /*
        * tbl masterdata_semester
        */
        $this->dbforge->add_field([
            'id_smt' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nm_semester' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'default' => NULL,
            ],
        ]);

        $this->dbforge->add_key('id_smt', TRUE);
        $this->dbforge->create_table('masterdata_semester');

        /*
        * tbl masterdata_prodi
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_prodi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'kode_program_studi' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_program_studi' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '2',
            ],
            'id_jenjang_pendidikan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_jenjang_pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('id_jenjang_pendidikan');
        $this->dbforge->create_table('masterdata_prodi');

        /*
        * tbl masterdata_jalur_masuk
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'jalur_masuk' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => NULL,
            ],
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('masterdata_jalur_masuk');

        /*
        * tbl masterdata_ikatan_kerja_sdm
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'nama_ikatan_kerja' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL,
            ],
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('masterdata_ikatan_kerja_sdm');

        /*
        * tbl masterdata_jabatan_fungsional
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_jabatan_fungsional' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'default' => NULL,
            ],
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('masterdata_jabatan_fungsional');

        /*
        * tbl masterdata_jenis_pendaftaran
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'jenis_pendaftaran' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => NULL,
            ],
            'untuk_daftar_sekolah' => [
                'type' => 'ENUM("0","1")',
                'default' => "1",
            ],

        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('masterdata_jenis_pendaftaran');

        /*
        * tbl masterdata_pembiayaan
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ],
            'nm_pembiayaan' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'default' => NULL,
            ],
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('masterdata_pembiayaan');

        /*
        * tbl masterdata_jenis_keluar
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'jenis_keluar' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => NULL,
            ],
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('masterdata_jenis_keluar');

        /*
        * tbl masterdata_agama
        */
        $this->dbforge->add_field([
            'id_agama' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_agama' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => NULL,
            ],
        ]);
        $this->dbforge->create_table('masterdata_agama');
        // $initial_data = [
        //     0 => [
        //         'id_agama' => 1,
        //         'nama_agama' => 'Islam',
        //     ],
        //     1 => [
        //         'id_agama' => 2,
        //         'nama_agama' => 'Kristen',
        //     ],
        //     2 => [
        //         'id_agama' => 3,
        //         'nama_agama' => 'Katholik',
        //     ],
        //     3 => [
        //         'id_agama' => 4,
        //         'nama_agama' => 'Hindu',
        //     ],
        //     4 => [
        //         'id_agama' => 5,
        //         'nama_agama' => 'Budha',
        //     ],
        //     5 => [
        //         'id_agama' => 6,
        //         'nama_agama' => 'Konghuchu',
        //     ],
        //     6 => [
        //         'id_agama' => 99,
        //         'nama_agama' => 'Lainnya',
        //     ],
        // ];
        // $this->db->insert_batch('masterdata_agama', $initial_data);

        /*
        * tbl masterdata_alat_transportasi
        */
        $this->dbforge->add_field([
            'id_alat_transportasi' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_alat_transportasi' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'default' => NULL,
            ],
        ]);
        $this->dbforge->create_table('masterdata_alat_transportasi');


        /*
        * tbl masterdata_jenis_tinggal
        */
        $this->dbforge->add_field([
            'id_jenis_tinggal' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_jenis_tinggal' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
            ],
        ]);
        $this->dbforge->create_table('masterdata_jenis_tinggal');
        // $initial_data = [
        //     0 => [
        //         'id_jenis_tinggal' => 1,
        //         'nama_jenis_tinggal' => 'Bersama orang tua',
        //     ],
        //     1 => [
        //         'id_jenis_tinggal' => 2,
        //         'nama_jenis_tinggal' => 'Bersama orang wali',
        //     ],
        //     2 => [
        //         'id_jenis_tinggal' => 3,
        //         'nama_jenis_tinggal' => 'Kost',
        //     ],
        //     3 => [
        //         'id_jenis_tinggal' => 4,
        //         'nama_jenis_tinggal' => 'Asrama',
        //     ],
        //     4 => [
        //         'id_jenis_tinggal' => 5,
        //         'nama_jenis_tinggal' => 'Panti asuhan',
        //     ],
        //     5 => [
        //         'id_jenis_tinggal' => 99,
        //         'nama_jenis_tinggal' => 'Lainnya',
        //     ],
        // ];
        // $this->db->insert_batch('masterdata_jenis_tinggal', $initial_data);

        /*
        * tbl masterdata_jenjang_pendidikan
        */
        $this->dbforge->add_field([
            'id_jenjang_didik' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_jenjang_didik' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->dbforge->create_table('masterdata_jenjang_pendidikan');

        /*
        * tbl masterdata_kebutuhan_khusus
        */
        $this->dbforge->add_field([
            'id_kebutuhan_khusus' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_kebutuhan_khusus' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
            ],
        ]);
        $this->dbforge->create_table('masterdata_kebutuhan_khusus');

        /*
        * tbl masterdata_negara
        */
        $this->dbforge->add_field([
            'id_negara' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
            ],
            'nama_negara' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
            ]
        ]);
        $this->dbforge->create_table('masterdata_negara');

        /*
        * tbl masterdata_pekerjaan
        */
        $this->dbforge->add_field([
            'id_pekerjaan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
            ],
        ]);
        $this->dbforge->create_table('masterdata_pekerjaan');

        /*
        * tbl masterdata_penghasilan
        */
        $this->dbforge->add_field([
            'id_penghasilan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_penghasilan' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
        ]);
        $this->dbforge->create_table('masterdata_penghasilan');

        /*
        * tbl masterdata_wilayah
        */
        $this->dbforge->add_field([
            'id_wilayah' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
            ],
            'id_negara' => [
                'type' => 'VARCHAR',
                'constraint' => '5',
            ],
            'nama_wilayah' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
            ]
        ]);
        $this->dbforge->create_table('masterdata_wilayah');


        #### CORE TABLE SETUP *********************************************************

        /*
        * tbl feeder config
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ],
            'nm_lembaga' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'default' => NULL,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL,
            ],
            'host' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'port' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'default' => NULL,
            ],
            'id_sp' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'default' => NULL,
            ],
            'live' => [
                'type' => 'ENUM("Y", "N")',
                'default' => "N",
            ],
            'status_connected' => [
                'type' => 'ENUM("Y", "N")',
                'default' => "N",
            ],
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('conf_feeder');
        ############################################################################################################

        /*
        * tbl mfa_message
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ],
            'pengirim' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'type' => [
                'type' => 'ENUM("brodcast","dm")',
                'default' => "brodcast",
            ],
            'penerima' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'judul_pesan' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'default' => NULL,
            ],
            'isi_pesan' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'default' => NULL,
            ],
            'tgl_pesan' => [
                'type' => 'DATE',
            ],
            'is_read' => [
                'type' => 'ENUM("Y", "N")',
                'default' => "N",
            ]
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('mfa_message');
        ############################################################################################################

        /*
        * tbl mfa_menu
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ],
            'nav_act' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'default' => NULL,
            ],
            'page_name' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'default' => NULL,
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'main_table' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'default' => NULL,
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'default' => NULL,
            ],
            'urutan_menu' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => NULL,
            ],
            'parent' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => NULL,
            ],
            'dt_table' => [
                'type' => 'ENUM("Y","N")',
            ],
            'show' => [
                'type' => 'ENUM("Y","N")',
            ],
            'type_menu' => [
                'type' => 'ENUM("main","page")',
            ],
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('mfa_menu');
        ############################################################################################################

        /*
        * tbl mfa_menu_access
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ],
            'id_menu' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => NULL,
            ],
            'id_group' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => NULL,
            ],
            'read_permision' => [
                'type' => 'ENUM("Y","N")',
            ],
            'insert_permision' => [
                'type' => 'ENUM("Y","N")',
            ],
            'update_permision' => [
                'type' => 'ENUM("Y","N")',
            ],
            'delete_permision' => [
                'type' => 'ENUM("Y","N")',
            ],
            'push_permision' => [
                'type' => 'ENUM("Y","N")',
            ],
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('id_menu', 'id_group');
        $this->dbforge->create_table('mfa_menu_access');
        ############################################################################################################

        /*
        * tbl mfa_version
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ],
            'hash_key' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'version' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'desc' => [
                'type' => 'TEXT',
            ]
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('mfa_version');
        $initial_data = [
            'hash_key' => password_hash(rand(5, 10), PASSWORD_DEFAULT),
            'version' => '1.0',
            'desc' => '<p>initial release mfa</p>'
        ];
        $this->db->insert('mfa_version', $initial_data);
        ############################################################################################################


        /*
        * # tbl mfa_group_users
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ],
            'level' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'desc' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
            ],
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('mfa_group_users');
        $initial_data = [
            0 => [
                'level' => 'admin',
                'desc' => 'Administrator'
            ],
            1 => [
                'level' => 'jurusan',
                'desc' => 'Operator Jurusan'
            ]
        ];
        $this->db->insert_batch('mfa_group_users', $initial_data);
        ############################################################################################################


        /*
        * # tbl mfa_users 
        */
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'foto_user' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_group' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'kode_jurusan' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => NULL,
            ],
            'aktif' => [
                'type' => 'ENUM("Y","N")',
                'default' => 'N',
                'null' => FALSE,
            ],
            'date_created' => [
                'type' => 'DATE',
            ],
            'last_login' => [
                'type' => 'DATE',
            ],
            'stat_act' => [
                'type' => 'ENUM("Y","N")',
                'default' => 'N',
                'null' => FALSE,
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key(['id_group', 'kode_jurusan']);
        $this->dbforge->create_table('mfa_users');

        // initial data
        $initial_data = [
            'first_name' => 'super',
            'last_name' => 'admin',
            'username' => 'superadmin',
            'password' => password_hash("adminmfa", PASSWORD_DEFAULT),
            'email' => 'admin@mfa.com',
            'foto_user' => 'default_user.jpg',
            'id_group' => '1',
            'kode_jurusan' => null,
            'aktif' => 'Y',
            'date_created' => date('Y-m-d'),
            'last_login' => date('Y-m-d'),
            'stat_act' => 'N',
        ];
        $this->db->insert('mfa_users', $initial_data);
    }
    public function down()
    {
        // TABLE DATA TRANSACTIONAL
        $this->dbforge->drop_table('tbl_kurikulum');
        // TABLE DATA MASTER 
        $this->dbforge->drop_table('masterdata_semester');
        $this->dbforge->drop_table('masterdata_ikatan_kerja_sdm');
        $this->dbforge->drop_table('masterdata_jabatan_fungsional');
        $this->dbforge->drop_table('masterdata_jalur_masuk');
        $this->dbforge->drop_table('masterdata_jenis_pendaftaran');
        $this->dbforge->drop_table('masterdata_jenis_keluar');
        $this->dbforge->drop_table('masterdata_pembiayaan');
        ################ MASTER DATA FROM FEEDER ###################
        $this->dbforge->drop_table('masterdata_agama');
        $this->dbforge->drop_table('masterdata_alat_transportasi');
        $this->dbforge->drop_table('masterdata_jenis_tinggal');
        $this->dbforge->drop_table('masterdata_jenjang_pendidikan');
        $this->dbforge->drop_table('masterdata_kebutuhan_khusus');
        $this->dbforge->drop_table('masterdata_negara');
        $this->dbforge->drop_table('masterdata_pekerjaan');
        $this->dbforge->drop_table('masterdata_penghasilan');
        $this->dbforge->drop_table('masterdata_wilayah');

        // TABLE CORE SYSTEM
        $this->dbforge->drop_table('mfa_users');
        $this->dbforge->drop_table('mfa_group_users');
        $this->dbforge->drop_table('mfa_version');
        $this->dbforge->drop_table('mfa_menu_access');
        $this->dbforge->drop_table('mfa_menu');
        $this->dbforge->drop_table('mfa_message');
        $this->dbforge->drop_table('conf_feeder');
    }
}
