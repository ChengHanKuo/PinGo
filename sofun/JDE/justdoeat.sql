CREATE TABLE IF NOT EXISTS `menu` (  `fNo` varchar(5) NOT NULL,  `fName` varchar(10) NOT NULL,  `type` varchar(10) NOT NULL,  `cook` varchar(10) NOT NULL,  PRIMARY KEY (`fNo`)) ENGINE=InnoDB DEFAULT CHARSET=big5;

INSERT INTO `menu` (`fNo`, `fName`, `type`, `cook`) VALUES ('veg01', '���R��', '����', '����'),('veg02', '���wۣ', '����', '����/�N'),('veg03', '�C��', '����', '�N'),('veg04', '��ۣ', '����', '����/�N'),('veg05', '�ᷦ��', '����', '�N'),('veg06', '�ɦ�', '����', '����/�N'),('veg07', '���jۣ', '����', '����/�N'),('veg08', '�v��', '����', '����'),('veg09', '����', '����', '����'),('veg10', '�q��ۣ', '����', '����/�N'),('veg11', '�������a��', '����', '����'),
 ('sea01', '���o����', '���A', '�N'),('sea02', '��', '���A', '�N/����'),('sea03', '��K', '���A', '�N'),('sea04', '�j���', '���A', '�N/����'),('sea05', '�z��', '���A', '�N/����'),('sea06', '��M��', '���A', '�N'),('sea07', '���Q���U��', '���A', '�N'),('sea08', '����', '���A', '�N'),('sea09', '���o�ɶ�', '���A', '�N'),('sea10', '�h����', '���A', '�N'),('sea11', '�{��', '���A', '�N'),('sea12', '�j����', '���A', '�N'),('sea13', '�D���{', '���A', '�N'),
('oth01', '������', '��L', '�N/����'),('oth02', '�½�', '��L', '�N/����'),('oth03', '�^�Y', '��L', '����'),('oth04', '���Y', '��L', '����'),('oth05', '�P��', '��L', '����'),('oth06', '����', '��L', '����'),('oth07', '�������J', '��L', '����'),('oth08', '�ਧ�G', '��L', '����'),('oth09', '�ᨧ�G', '��L', '����'),('oth10', '�ɦ״�','��L', '����'),('oth11', '�j�z�Y', '��L', '�N'),('oth12', '�n��', '��L', '����'),('oth13', '�ն�', '��L', '�L'),('oth14', '�z�̸z', '��L', '�N'),('oth15', '�̦�|', '��L', '�N/����'),('oth16', '���O', '��L', '����'),
('mea01', '�D�w������', '����', '�N'),('mea02', '�Y��F��', '����', '�N'),('mea03', '������', '����', '�N'),('mea04', '���p��', '����', '�N'),('mea05', '���곷���', '����', '�N'),('mea06', '������פ�', '����', '����'),('mea07', '�ޤ���', '����', '�N'),('mea08', '�����', '����', '�N'),('mea09', '�Q����', '����', '�N'),('mea10', '����', '����', '�N'),('mea11', '����', '����', '�N'),('mea12', '���L��', '����', '�N'),('mea13', '�Ϥ���', '����', '�N'),('mea14', '�Ϥp��', '����', '�N'),
('dri01', '�i�f�i��', '����', '�T��'),('dri02', 'Zero�i��', '����', '�T��'),('dri03', '����', '����', '�T��'),('dri04', '��F(��l�f��)', '����', '�T��'),('dri05', '��F(����f��)', '����', '�T��'),('dri06', '�i������', '����', '�T��'),('dri07', '�[�Q�F�h', '����', '�T��'),('dri08', '���_������', '����', '����'),('dri09', '���_�f�c��', '����', '����'),('dri10', '��������', '����', '����'),('dri11', '�V�ʯ�', '����', '����'),
('des01', '�馡���', '���I', '���I'),('des02', '�֪G�l', '���I', '���I'),('des03', '���ԥ����J�O', '���I', '���I'),('des04', '��@���r�N', '���I', '���I'),('des05', '�q���_�h��', '���I', '���\'),('des06', '�B�ߦa��', '���I', '���\'),('des07', '�S�@���P���z', '���I', '���\'),('des08', '�����l���N', '���I', '���\');

CREATE TABLE IF NOT EXISTS `info` (  `cNo` int(10) NOT NULL AUTO_INCREMENT,  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `tNo` varchar(5) NOT NULL,  PRIMARY KEY (`cNo`)) ENGINE=InnoDB  DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `order` (  `oNo` int(10) NOT NULL AUTO_INCREMENT,  `cNo` int(10) NOT NULL, `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `fName` varchar(10) NOT NULL,  `fa` int(1) NOT NULL,`done` boolean NOT NULL,PRIMARY KEY(`oNo`)) ENGINE=InnoDB DEFAULT CHARSET=big5 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `satisfaction` (  `cNo` int(10) NOT NULL,  `first` varchar(2) NOT NULL,`info` varchar(10) NOT NULL,`what` varchar(10) NOT NULL,   `sMeat` int(1) NOT NULL,  `sSeafood` int(1) NOT NULL,  `sVege` int(1) NOT NULL,  `sDessert` int(1) NOT NULL,  `sDrink` int(1) NOT NULL,  `sOther` int(1) NOT NULL,`sService` int(1) NOT NULL,  `comments` varchar(100) NOT NULL,PRIMARY KEY(`cNo`)) ENGINE=InnoDB DEFAULT CHARSET=big5;