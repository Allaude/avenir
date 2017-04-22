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

$lang['email_must_be_array'] = 'email validasi harus di parsing ke dalam array';
$lang['email_invalid_address'] = 'Alamat email tidak valid: %s';
$lang['email_attachment_missing'] = 'tidak bisa menemukan file attachment yang dimaksud: %s';
$lang['email_attachment_unreadable'] = 'tidak bisa membuka file attachment yang dimaksud: %s';
$lang['email_no_from'] = 'tidak bisa mengirim email jika tidak ada from nya';
$lang['email_no_recipients'] = 'Kamu harus mengikutsertakan alamat yang di tuju : To, Cc, or Bcc';
$lang['email_send_failure_phpmail'] = 'Tidak bisa mengirim email menggunakan PHP mail(). Server mu mungkin tidak di konfigurasi untuk melakukan method ini';
$lang['email_send_failure_sendmail'] = 'Tidak bisa mengirim email menggunakan PHP Sendmail. Server mu mungkin tidak di konfigurasi untuk melakukan method ini.';
$lang['email_send_failure_smtp'] = 'Tidak bisa mengirimk email menggunakan PHP SMTP. Server mu mungkin tidak di konfigurasi untuk melakukan method ini';
$lang['email_sent'] = 'Pesan mu telah terkirim menggunakan konfigurasi ini : %s';
$lang['email_no_socket'] = 'tidak bisa membuka socket untuk melakukan fungsi send email, coba konfigurasi ulang.';
$lang['email_no_hostname'] = 'kamu tidak mengkonfigurasi hostname';
$lang['email_smtp_error'] = 'Kesalahan pada pengauran SMTP : %s';
$lang['email_no_smtp_unpw'] = 'Kesalahan : kamu harus menyebutkan username dan password';
$lang['email_failed_smtp_login'] = 'Tidak bisa untuk login karena : : %s';
$lang['email_smtp_auth_un'] = 'tidak bisa meng autentifikasi username. Error: %s';
$lang['email_smtp_auth_pw'] = 'tidak bisa meng authentifikasi password. Error: %s';
$lang['email_smtp_data_failure'] = 'Tidak bisa mengirim data: %s';
$lang['email_exit_status'] = 'Exit status code: %s';
