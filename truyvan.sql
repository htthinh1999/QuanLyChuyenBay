-- 12. Cho biết mã chuyến bay, mã nhân viên, tên nhân viên được phân công vào chuyến
--     bay xuất phát ngày 10/31/2000 tại sân bay MIA vào lúc 20:30
SELECT C.MACB, N.MANV, TEN
FROM PHANCONG P INNER JOIN NHANVIEN N ON P.MANV = N.MANV
				INNER JOIN LICHBAY L ON P.NGAYDI = L.NGAYDI AND P.MACB = L.MACB
				INNER JOIN CHUYENBAY C ON L.MACB = C.MACB
WHERE L.NGAYDI = '2000-10-31' AND SBDI = 'MIA' AND GIODI = '20:30';

-- 21. Cho biết mã chuyến bay, ngày đi cùng với số lượng nhân viên không phải là phi công của chuyến bay đó.
SELECT MACB, NGAYDI, COUNT(*) 'SOLUONG'
FROM PHANCONG P INNER JOIN NHANVIEN N ON P.MANV = N.MANV
WHERE LOAINV <> 1
GROUP BY MACB, NGAYDI;