DELIMITER //

CREATE TRIGGER `update_nama_when_tb_user_change` AFTER UPDATE ON `tb_user`
FOR EACH ROW 
BEGIN
	IF NEW.TXT_NAMA != OLD.TXT_NAMA THEN
		UPDATE `tb_form_penilaian_karyawan` SET `TXT_NAMA_PEMBUAT` = NEW.TXT_NAMA WHERE `TXT_NAMA_PEMBUAT` = OLD.TXT_NAMA;
		UPDATE `tb_form_penilaian_karyawan` SET `TXT_NAMA_KARYAWAN` = NEW.TXT_NAMA WHERE `TXT_NAMA_KARYAWAN` = OLD.TXT_NAMA;
		UPDATE `tb_hasil_nilai_tujuh_kk` SET `TXT_NAMA_KARYAWAN` = NEW.TXT_NAMA WHERE `TXT_NAMA_KARYAWAN` = OLD.TXT_NAMA;
		UPDATE `tb_pengajuan` SET `TXT_NAMA_PENGAJU` = NEW.TXT_NAMA WHERE `TXT_NAMA_PENGAJU` = OLD.TXT_NAMA;
		UPDATE `tb_pengajuan` SET `TXT_NAMA_KARYAWAN` = NEW.TXT_NAMA WHERE `TXT_NAMA_KARYAWAN` = OLD.TXT_NAMA;
		UPDATE `tb_penilai` SET `TXT_PENILAI_1` = NEW.TXT_NAMA WHERE `TXT_PENILAI_1` = OLD.TXT_NAMA;
		UPDATE `tb_penilai` SET `TXT_PENILAI_2` = NEW.TXT_NAMA WHERE `TXT_PENILAI_2` = OLD.TXT_NAMA;
		UPDATE `tb_penilai` SET `TXT_PENILAI_3` = NEW.TXT_NAMA WHERE `TXT_PENILAI_3` = OLD.TXT_NAMA;
		UPDATE `tb_penilai` SET `TXT_PENILAI_4` = NEW.TXT_NAMA WHERE `TXT_PENILAI_4` = OLD.TXT_NAMA;
		UPDATE `tb_penilai` SET `TXT_PENILAI_5` = NEW.TXT_NAMA WHERE `TXT_PENILAI_5` = OLD.TXT_NAMA;
		-- tambahkan query yang lain disini
	END IF;
END;
//
DELIMITER ;