<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['db_invalid_connection_str'] = 'Tidak bisa menghubungkan ke database karena kesalahan Konfigurasi Database';
$lang['db_unable_to_connect'] = 'Tidak bisa terkoneksi dengan database menggunakan settingan dari Konfigurasi anda';
$lang['db_unable_to_select'] = 'Tidak bisa menjalankan query select terhadap database : %s';
$lang['db_unable_to_create'] = 'Tidak bisa menjalankan query create terhadap database: %s';
$lang['db_invalid_query'] = 'Query yang anda gunakan tidak valid';
$lang['db_must_set_table'] = 'Kamu harus mengkonfigurasi table database agar query mu berjalan';
$lang['db_must_use_set'] = 'Kamu harus menggunakan method set untuk menggunakan query update';
$lang['db_must_use_index'] = 'Kamu harus spesifik menggunakan id untuk menjalankan query update';
$lang['db_batch_missing_index'] = 'satu atau lebih kolom yang anda masukan tidak spesifik id nya';
$lang['db_must_use_where'] = 'Update tidak diperbolehkan jika tidak menggunakan klausa where';
$lang['db_del_must_use_where'] = 'Delete tidak diperbolehkan jika tidak menggunakan klausa where atau like';
$lang['db_field_param_missing'] = 'Untuk mengambil data dibutuhkan nama tabel sebagai parameter.';
$lang['db_unsupported_function'] = 'Fungsi ini tidak didukung pada database yang anda gunakan';
$lang['db_transaction_failure'] = 'Transaksi gagal: Rollback performed.';
$lang['db_unable_to_drop'] = 'Tidak bisa menghapus database yang dimaksud';
$lang['db_unsupported_feature'] = 'Fitur ini tidak tersedia pada database yang anda gunakan';
$lang['db_unsupported_compression'] = 'file kompress yang anda pilih tidak di support oleh server';
$lang['db_filepath_error'] = 'Tidak bisa menuliskan data pada lokasi penyimpanan file';
$lang['db_invalid_cache_path'] = 'tempat lokasi chache yang anda inputkan tidak valid ';
$lang['db_table_name_required'] = 'Nama tabel dibutuhkan untuk melakasanakan operasi ini';
$lang['db_column_name_required'] = 'Nama kolom database dibutuhkan untuk melakasanakan operasi ini';
$lang['db_column_definition_required'] = 'Kolom yang didefinisikan dibutuhkan untuk melaksanakan opersasi ini';
$lang['db_unable_to_set_charset'] = 'tidak bisa mengkonfigurasi kanektor client charakter: %s';
$lang['db_error_heading'] = 'Telah terjadi error pasa database';
