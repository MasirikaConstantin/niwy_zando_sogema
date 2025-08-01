
INSERT INTO places ("id", "nom", "prix", "type_place_id", "orientation", "save_by", "created_at", "updated_at") VALUES
(1, "Magasin", 0, NULL, "", NULL, NULL, NULL),
(2, "Etalage", 60, 12, "NA", NULL, NULL, NULL),
(3, "Kiosque", 0, NULL, "", NULL, NULL, NULL),
(4, "Entrepôt", 0, NULL, "", NULL, NULL, NULL),
(5, "Chambre froide Négative", 0, 10, "EX", NULL, NULL, NULL),
(6, "Magasin", 1000, 1, "EX", NULL, NULL, NULL),
(7, "Magasin", 2000, 2, "EX", NULL, NULL, NULL),
(8, "Magasin", 1000, 1, "IN", NULL, NULL, NULL),
(9, "Magasin", 2000, 2, "IN", NULL, NULL, NULL),
(12, "Magasin sous escalier", 2000, 2, "IN", NULL, NULL, NULL),
(13, "Magasin", 0, 3, "IN", NULL, NULL, NULL),
(14, "Magasin", 0, 4, "IN", NULL, NULL, NULL),
(15, "Magasin", 1000, 5, "IN", NULL, NULL, NULL),
(16, "Magasin", 0, 6, "IN", NULL, NULL, NULL),
(17, "Magasin", 0, 7, "IN", NULL, NULL, NULL),
(18, "Magasin", 0, 8, "IN", NULL, NULL, NULL),
(19, "Magasin", 0, 9, "IN", NULL, NULL, NULL),
(20, "Chambre froide Positive", 0, 10, "EX", NULL, NULL, NULL),
(21, "Magasin", 0, 11, "IN", NULL, NULL, NULL);




INSERT INTO "type_places" ("id", "nom", "dimension", "save_by", "created_at", "updated_at") VALUES
(1, 'T1', '12m²', 0, NULL, NULL),
(2, 'T2', '24m²', 0, NULL, NULL),
(3, 'T3', '40m²', 0, NULL, NULL),
(4, 'T4', '75m²', 0, NULL, NULL),
(5, 'T6', '12m²', 0, NULL, NULL),
(6, 'T8', '150m²', 0, NULL, NULL),
(7, 'T9', '175m²', 0, NULL, NULL),
(8, 'T10', '200m²', 0, NULL, NULL),
(9, 'T11', '125m²', 0, NULL, NULL),
(10, 'T5', '100m²', 0, NULL, NULL),
(11, 'T7', '133m²', 0, NULL, NULL),
(12, 'NA', '1 m/ 80 cm', 0, NULL, NULL);













INSERT INTO "pavillons" ("id", "numero", "niveau", "user_id", "created_at", "updated_at") VALUES
(1, 'BOLINGO', 0, NULL, NULL, NULL),
(2, 'BOLINGO', 1, NULL, NULL, NULL),
(3, 'BOLINGO', 2, NULL, NULL, NULL),
(4, 'BOLINGO', 3, NULL, NULL, NULL),
(5, 'ECOLE', 0, NULL, NULL, NULL),
(6, 'ECOLE', 1, NULL, NULL, NULL),
(7, 'ECOLE', 2, NULL, NULL, NULL),
(8, 'ECOLE', 3, NULL, NULL, NULL),
(9, 'ECOLE / RUAKANDINGI', 0, NULL, NULL, NULL),
(10, 'ECOLE / RUAKANDINGI', 1, NULL, NULL, NULL),
(11, 'ECOLE / RUAKANDINGI', 2, NULL, NULL, NULL),
(12, 'ECOLE / RUAKANDINGI', 3, NULL, NULL, NULL),
(13, 'RUAKANDINGI', 0, NULL, NULL, NULL),
(14, 'RUAKANDINGI', 1, NULL, NULL, NULL),
(15, 'RUAKANDINGI', 2, NULL, NULL, NULL),
(16, 'RUAKANDINGI', 3, NULL, NULL, NULL),
(17, 'MARRAIS', 0, NULL, NULL, NULL),
(18, 'MARRAIS', 1, NULL, NULL, NULL),
(19, 'MARRAIS', 2, NULL, NULL, NULL),
(20, 'MARRAIS', 3, NULL, NULL, NULL),
(21, 'BOLINGO / ECOLE / RUAKANDINGI', 0, NULL, NULL, NULL),
(22, 'BOLINGO / ECOLE / RUAKANDINGI', 1, NULL, NULL, NULL),
(23, 'BOLINGO / ECOLE / RUAKANDINGI', 2, NULL, NULL, NULL),
(24, 'BOLINGO / ECOLE / RUAKANDINGI', 3, NULL, NULL, NULL),
(25, 'BOLINGO / ECOLE', 0, NULL, NULL, NULL),
(26, 'BOLINGO / ECOLE', 1, NULL, NULL, NULL),
(27, 'BOLINGO / ECOLE', 2, NULL, NULL, NULL),
(28, 'BOLINGO / ECOLE', 3, NULL, NULL, NULL),
(29, 'A3 - 001', 0, NULL, NULL, NULL),
(30, 'A3 - 002', 0, NULL, NULL, NULL),
(31, 'A3 - 003', 0, NULL, NULL, NULL),
(32, 'A3 - 004', 0, NULL, NULL, NULL),
(33, 'A3 - 005', 0, NULL, NULL, NULL),
(34, 'A3 - 006', 0, NULL, NULL, NULL),
(35, 'A3 - 007', 0, NULL, NULL, NULL),
(36, 'A3 - 008', 0, NULL, NULL, NULL),
(37, 'A3 - 009', 0, NULL, NULL, NULL),
(38, 'A3 - 010', 0, NULL, NULL, NULL),
(39, 'A3 - 011', 0, NULL, NULL, NULL),
(40, 'A3 - 012', 0, NULL, NULL, NULL),
(41, 'A3 - 013', 0, NULL, NULL, NULL),
(42, 'A3 - 014', 0, NULL, NULL, NULL),
(43, 'A3 - 015', 0, NULL, NULL, NULL),
(44, 'A3 - 016', 0, NULL, NULL, NULL),
(45, 'A4 - 001', 0, NULL, NULL, NULL),
(46, 'A4 - 002', 0, NULL, NULL, NULL),
(47, 'A4 - 003', 0, NULL, NULL, NULL),
(48, 'A4 - 004', 0, NULL, NULL, NULL),
(49, 'A4 - 005', 0, NULL, NULL, NULL),
(50, 'A4 - 006', 0, NULL, NULL, NULL),
(51, 'A4 - 007', 0, NULL, NULL, NULL),
(52, 'A4 - 008', 0, NULL, NULL, NULL),
(53, 'B3 - 001', 0, NULL, NULL, NULL),
(54, 'B3 - 002', 0, NULL, NULL, NULL),
(55, 'B3 - 003', 0, NULL, NULL, NULL),
(56, 'B3 - 004', 0, NULL, NULL, NULL),
(57, 'B3 - 005', 0, NULL, NULL, NULL),
(58, 'B3 - 006', 0, NULL, NULL, NULL),
(59, 'B3 - 007', 0, NULL, NULL, NULL),
(60, 'B3 - 008', 0, NULL, NULL, NULL),
(61, 'B3 - 009', 0, NULL, NULL, NULL),
(62, 'B3 - 010', 0, NULL, NULL, NULL),
(63, 'B3 - 011', 0, NULL, NULL, NULL),
(64, 'B3 - 012', 0, NULL, NULL, NULL),
(65, 'B3 - 013', 0, NULL, NULL, NULL),
(66, 'B3 - 014', 0, NULL, NULL, NULL),
(67, 'B4 - 001', 0, NULL, NULL, NULL),
(68, 'B4 - 002', 0, NULL, NULL, NULL),
(69, 'B4 - 003', 0, NULL, NULL, NULL),
(70, 'B4 - 004', 0, NULL, NULL, NULL),
(71, 'B4 - 005', 0, NULL, NULL, NULL),
(72, 'B4 - 006', 0, NULL, NULL, NULL),
(73, 'B4 - 007', 0, NULL, NULL, NULL),
(74, 'B4 - 008', 0, NULL, NULL, NULL),
(75, 'B4 - 009', 0, NULL, NULL, NULL),
(76, 'B4 - 010', 0, NULL, NULL, NULL),
(77, 'B4 - 011', 0, NULL, NULL, NULL),
(78, 'B4 - 012', 0, NULL, NULL, NULL),
(79, 'B4 - 013', 0, NULL, NULL, NULL),
(80, 'B4 - 014', 0, NULL, NULL, NULL),
(81, 'C3 - 001', 0, NULL, NULL, NULL),
(82, 'C3 - 002', 0, NULL, NULL, NULL),
(83, 'C3 - 003', 0, NULL, NULL, NULL),
(84, 'C3 - 004', 0, NULL, NULL, NULL),
(85, 'C3 - 005', 0, NULL, NULL, NULL),
(86, 'C3 - 006', 0, NULL, NULL, NULL),
(87, 'C3 - 007', 0, NULL, NULL, NULL),
(88, 'C3 - 008', 0, NULL, NULL, NULL),
(89, 'C3 - 009', 0, NULL, NULL, NULL),
(90, 'C3 - 010', 0, NULL, NULL, NULL),
(91, 'C3 - 011', 0, NULL, NULL, NULL),
(92, 'C3 - 012', 0, NULL, NULL, NULL),
(93, 'C3 - 013', 0, NULL, NULL, NULL),
(94, 'C3 - 014', 0, NULL, NULL, NULL),
(95, 'C3 - 015', 0, NULL, NULL, NULL),
(96, 'C3 - 016', 0, NULL, NULL, NULL),
(97, 'C3 - 017', 0, NULL, NULL, NULL),
(98, 'C3 - 018', 0, NULL, NULL, NULL),
(99, 'C3 - 019', 0, NULL, NULL, NULL),
(100, 'C3 - 020', 0, NULL, NULL, NULL),
(101, 'C4 - 001', 0, NULL, NULL, NULL),
(102, 'C4 - 002', 0, NULL, NULL, NULL),
(103, 'C4 - 003', 0, NULL, NULL, NULL),
(104, 'C4 - 004', 0, NULL, NULL, NULL),
(105, 'C4 - 005', 0, NULL, NULL, NULL),
(106, 'C4 - 006', 0, NULL, NULL, NULL),
(107, 'C4 - 007', 0, NULL, NULL, NULL),
(108, 'C4 - 008', 0, NULL, NULL, NULL),
(109, 'D3 - 001', 0, NULL, NULL, NULL),
(110, 'D3 - 002', 0, NULL, NULL, NULL),
(111, 'D3 - 003', 0, NULL, NULL, NULL),
(112, 'D3 - 004', 0, NULL, NULL, NULL),
(113, 'D3 - 005', 0, NULL, NULL, NULL),
(114, 'D3 - 006', 0, NULL, NULL, NULL),
(115, 'D3 - 007', 0, NULL, NULL, NULL),
(116, 'D3 - 008', 0, NULL, NULL, NULL),
(117, 'D4- 001', 0, NULL, NULL, NULL),
(118, 'D4- 002', 0, NULL, NULL, NULL),
(119, 'D4- 003', 0, NULL, NULL, NULL),
(120, 'D4- 004', 0, NULL, NULL, NULL),
(121, 'D4- 005', 0, NULL, NULL, NULL),
(122, 'D4- 006', 0, NULL, NULL, NULL),
(123, 'D4- 007', 0, NULL, NULL, NULL),
(124, 'D4- 008', 0, NULL, NULL, NULL),
(125, 'E3- 007', 0, NULL, NULL, NULL),
(126, 'E3- 008', 0, NULL, NULL, NULL),
(127, 'E3- 009', 0, NULL, NULL, NULL),
(128, 'E3- 010', 0, NULL, NULL, NULL),
(129, 'E3- 011', 0, NULL, NULL, NULL),
(130, 'E3- 012', 0, NULL, NULL, NULL),
(131, 'E3- 013', 0, NULL, NULL, NULL),
(132, 'E3- 014', 0, NULL, NULL, NULL),
(133, 'E3- 015', 0, NULL, NULL, NULL),
(134, 'E3- 016', 0, NULL, NULL, NULL),
(135, 'E4- 001', 0, NULL, NULL, NULL),
(136, 'E4- 002', 0, NULL, NULL, NULL),
(137, 'E4- 003', 0, NULL, NULL, NULL),
(138, 'E4- 004', 0, NULL, NULL, NULL),
(139, 'E4- 005', 0, NULL, NULL, NULL),
(140, 'E4- 006', 0, NULL, NULL, NULL),
(141, 'E4- 007', 0, NULL, NULL, NULL),
(142, 'E4- 008', 0, NULL, NULL, NULL),
(143, 'E4- 009', 0, NULL, NULL, NULL),
(144, 'E4- 010', 0, NULL, NULL, NULL),
(145, 'E4- 011', 0, NULL, NULL, NULL),
(146, 'E4- 012', 0, NULL, NULL, NULL),
(147, 'F3 - 001', 0, NULL, NULL, NULL),
(148, 'F3 - 002', 0, NULL, NULL, NULL),
(149, 'F3 - 003', 0, NULL, NULL, NULL),
(150, 'F3 - 004', 0, NULL, NULL, NULL),
(151, 'F3 - 005', 0, NULL, NULL, NULL),
(152, 'F3 - 006', 0, NULL, NULL, NULL),
(153, 'F3 - 007', 0, NULL, NULL, NULL),
(154, 'F3 - 008', 0, NULL, NULL, NULL),
(155, 'F3 - 009', 0, NULL, NULL, NULL),
(156, 'F3 - 010', 0, NULL, NULL, NULL),
(157, 'F3 - 011', 0, NULL, NULL, NULL),
(158, 'F3 - 012', 0, NULL, NULL, NULL),
(159, 'F4 - 001', 0, NULL, NULL, NULL),
(160, 'F4 - 002', 0, NULL, NULL, NULL),
(161, 'F4 - 003', 0, NULL, NULL, NULL),
(162, 'F4 - 004', 0, NULL, NULL, NULL),
(163, 'F4 - 005', 0, NULL, NULL, NULL),
(164, 'F4 - 006', 0, NULL, NULL, NULL),
(165, 'F4 - 007', 0, NULL, NULL, NULL),
(166, 'F4 - 008', 0, NULL, NULL, NULL),
(167, 'A1 - 001', 0, NULL, NULL, NULL),
(168, 'A1 - 002', 0, NULL, NULL, NULL),
(169, 'A1 - 003', 0, NULL, NULL, NULL),
(170, 'A1 - 004', 0, NULL, NULL, NULL),
(171, 'A1 - 005', 0, NULL, NULL, NULL),
(172, 'A1 - 006', 0, NULL, NULL, NULL),
(173, 'A2 - 001', 0, NULL, NULL, NULL),
(174, 'A2 - 002', 0, NULL, NULL, NULL),
(175, 'A2 - 003', 0, NULL, NULL, NULL),
(176, 'A2 - 004', 0, NULL, NULL, NULL),
(177, 'A2 - 005', 0, NULL, NULL, NULL),
(178, 'A2 - 006', 0, NULL, NULL, NULL),
(179, 'A2 - 007', 0, NULL, NULL, NULL),
(180, 'A2 - 008', 0, NULL, NULL, NULL),
(181, 'B1 - 001', 0, NULL, NULL, NULL),
(182, 'B1 - 002', 0, NULL, NULL, NULL),
(183, 'B1 - 003', 0, NULL, NULL, NULL),
(184, 'B1 - 004', 0, NULL, NULL, NULL),
(185, 'B1 - 005', 0, NULL, NULL, NULL),
(186, 'B1 - 006', 0, NULL, NULL, NULL),
(187, 'B2 - 001', 0, NULL, NULL, NULL),
(188, 'B2 - 002', 0, NULL, NULL, NULL),
(189, 'B2 - 003', 0, NULL, NULL, NULL),
(190, 'B2 - 004', 0, NULL, NULL, NULL),
(191, 'B2 - 005', 0, NULL, NULL, NULL),
(192, 'B2 - 006', 0, NULL, NULL, NULL),
(193, 'B2 - 007', 0, NULL, NULL, NULL),
(194, 'B2 - 008', 0, NULL, NULL, NULL),
(195, 'B2 - 009', 0, NULL, NULL, NULL),
(196, 'B2 - 010', 0, NULL, NULL, NULL),
(197, 'C1-001', 0, NULL, NULL, NULL),
(198, 'C1-002', 0, NULL, NULL, NULL),
(199, 'C1-003', 0, NULL, NULL, NULL),
(200, 'C1-004', 0, NULL, NULL, NULL),
(201, 'C1-005', 0, NULL, NULL, NULL),
(202, 'C1-006', 0, NULL, NULL, NULL),
(203, 'C1-007', 0, NULL, NULL, NULL),
(204, 'C2-001', 0, NULL, NULL, NULL),
(205, 'C2-002', 0, NULL, NULL, NULL),
(206, 'C2-003', 0, NULL, NULL, NULL),
(207, 'C2-004', 0, NULL, NULL, NULL),
(208, 'C2-005', 0, NULL, NULL, NULL),
(209, 'C2-006', 0, NULL, NULL, NULL),
(210, 'C2-007', 0, NULL, NULL, NULL),
(211, 'C2-008', 0, NULL, NULL, NULL),
(212, 'C2-009', 0, NULL, NULL, NULL),
(213, 'C2-010', 0, NULL, NULL, NULL),
(214, 'C2-011', 0, NULL, NULL, NULL),
(215, 'C2-012', 0, NULL, NULL, NULL),
(216, 'C1-008', 0, NULL, NULL, NULL),
(217, 'D1-001', 0, NULL, NULL, NULL),
(218, 'D1-002', 0, NULL, NULL, NULL),
(219, 'D1-003', 0, NULL, NULL, NULL),
(220, 'D1-004', 0, NULL, NULL, NULL),
(221, 'D1-005', 0, NULL, NULL, NULL),
(222, 'D1-006', 0, NULL, NULL, NULL),
(223, 'D1-007', 0, NULL, NULL, NULL),
(224, 'D1-008', 0, NULL, NULL, NULL),
(225, 'D1-001', 0, NULL, NULL, NULL),
(226, 'D2-002', 0, NULL, NULL, NULL),
(227, 'D2-003', 0, NULL, NULL, NULL),
(228, 'D2-004', 0, NULL, NULL, NULL),
(229, 'D2-005', 0, NULL, NULL, NULL),
(230, 'D2-006', 0, NULL, NULL, NULL),
(231, 'D2-007', 0, NULL, NULL, NULL),
(232, 'D2-008', 0, NULL, NULL, NULL),
(233, 'E3-001', 0, NULL, NULL, NULL),
(234, 'E3-002', 0, NULL, NULL, NULL),
(235, 'E3-003', 0, NULL, NULL, NULL),
(236, 'E3-004', 0, NULL, NULL, NULL),
(237, 'E3-005', 0, NULL, NULL, NULL),
(238, 'E3-006', 0, NULL, NULL, NULL),
(239, 'E2-015', 0, NULL, NULL, NULL),
(240, 'E2-016', 0, NULL, NULL, NULL),
(241, 'E2-017', 0, NULL, NULL, NULL),
(242, 'E2-018', 0, NULL, NULL, NULL),
(243, 'E2-001', 0, NULL, NULL, NULL),
(244, 'E2-002', 0, NULL, NULL, NULL),
(245, 'E2-003', 0, NULL, NULL, NULL),
(246, 'E2-004', 0, NULL, NULL, NULL),
(247, 'E2- 005', 0, NULL, NULL, NULL),
(248, 'E2- 006', 0, NULL, NULL, NULL),
(249, 'E2- 007', 0, NULL, NULL, NULL),
(250, 'E2- 008', 0, NULL, NULL, NULL),
(251, 'E2- 009', 0, NULL, NULL, NULL),
(252, 'E2- 010', 0, NULL, NULL, NULL),
(253, 'E2- 011', 0, NULL, NULL, NULL),
(254, 'E2- 012', 0, NULL, NULL, NULL),
(255, 'E2- 013', 0, NULL, NULL, NULL),
(256, 'E2- 014', 0, NULL, NULL, NULL),
(257, 'E2- 015', 0, NULL, NULL, NULL),
(258, 'E1- 001', 0, NULL, NULL, NULL),
(259, 'E1- 002', 0, NULL, NULL, NULL),
(260, 'E1- 003', 0, NULL, NULL, NULL),
(261, 'E1- 004', 0, NULL, NULL, NULL),
(262, 'E1- 005', 0, NULL, NULL, NULL),
(263, 'E1- 006', 0, NULL, NULL, NULL),
(264, 'E1- 007', 0, NULL, NULL, NULL),
(265, 'E1- 008', 0, NULL, NULL, NULL),
(266, 'F1- 001', 0, NULL, NULL, NULL),
(267, 'F1- 002', 0, NULL, NULL, NULL),
(268, 'F1- 003', 0, NULL, NULL, NULL),
(269, 'F1- 004', 0, NULL, NULL, NULL),
(270, 'F1- 005', 0, NULL, NULL, NULL),
(271, 'F1- 006', 0, NULL, NULL, NULL),
(272, 'F1- 007', 0, NULL, NULL, NULL),
(273, 'F1- 008', 0, NULL, NULL, NULL),
(274, 'F1- 009', 0, NULL, NULL, NULL),
(275, 'F1- 010', 0, NULL, NULL, NULL),
(276, 'F1- 011', 0, NULL, NULL, NULL),
(277, 'F1- 012', 0, NULL, NULL, NULL),
(278, 'F2- 001', 0, NULL, NULL, NULL),
(279, 'F2- 002', 0, NULL, NULL, NULL),
(280, 'F2- 003', 0, NULL, NULL, NULL),
(281, 'F2- 004', 0, NULL, NULL, NULL),
(282, 'F2- 005', 0, NULL, NULL, NULL),
(283, 'F2- 006', 0, NULL, NULL, NULL),
(284, 'F2- 007', 0, NULL, NULL, NULL),
(285, 'F2- 008', 0, NULL, NULL, NULL),
(286, 'F2- 009', 0, NULL, NULL, NULL),
(287, 'F2- 010', 0, NULL, NULL, NULL),
(288, 'F2- 011', 0, NULL, NULL, NULL),
(289, 'F2- 012', 0, NULL, NULL, NULL),
(290, 'E3- 201', 2, NULL, NULL, NULL),
(291, 'E3- 202', 2, NULL, NULL, NULL),
(292, 'E3- 203', 2, NULL, NULL, NULL),
(293, 'E3- 204', 2, NULL, NULL, NULL),
(294, 'E3- 205', 2, NULL, NULL, NULL),
(295, 'E3- 206', 2, NULL, NULL, NULL),
(296, 'E3- 207', 2, NULL, NULL, NULL),
(297, 'E3- 208', 2, NULL, NULL, NULL),
(298, 'E3- 209', 2, NULL, NULL, NULL),
(299, 'E3- 210', 2, NULL, NULL, NULL),
(300, 'E3- 211', 2, NULL, NULL, NULL),
(301, 'E3- 212', 2, NULL, NULL, NULL),
(302, 'E3- 213', 2, NULL, NULL, NULL),
(303, 'E3- 214', 2, NULL, NULL, NULL),
(304, 'E3- 215', 2, NULL, NULL, NULL),
(305, 'E3- 216', 2, NULL, NULL, NULL),
(306, 'E4- 201', 2, NULL, NULL, NULL),
(307, 'E4- 202', 2, NULL, NULL, NULL),
(308, 'E4- 203', 2, NULL, NULL, NULL),
(309, 'E4- 204', 2, NULL, NULL, NULL),
(310, 'E4- 205', 2, NULL, NULL, NULL),
(311, 'E4- 206', 2, NULL, NULL, NULL),
(312, 'F3- 201', 2, NULL, NULL, NULL),
(313, 'F3- 202', 2, NULL, NULL, NULL),
(314, 'F3- 203', 2, NULL, NULL, NULL),
(315, 'F3- 204', 2, NULL, NULL, NULL),
(316, 'F3- 205', 2, NULL, NULL, NULL),
(317, 'F3- 206', 2, NULL, NULL, NULL),
(318, 'F3- 207', 2, NULL, NULL, NULL),
(319, 'F3- 208', 2, NULL, NULL, NULL),
(320, 'F3- 209', 2, NULL, NULL, NULL),
(321, 'F3- 210', 2, NULL, NULL, NULL),
(322, 'F3- 211', 2, NULL, NULL, NULL),
(323, 'F3- 212', 2, NULL, NULL, NULL),
(324, 'F3- 213', 2, NULL, NULL, NULL),
(325, 'F3- 214', 2, NULL, NULL, NULL),
(326, 'F3- 215', 2, NULL, NULL, NULL),
(327, 'F3- 216', 2, NULL, NULL, NULL),
(328, 'F3- 217', 2, NULL, NULL, NULL),
(329, 'F3- 218', 2, NULL, NULL, NULL),
(330, 'F4- 201', 2, NULL, NULL, NULL),
(331, 'F4- 202', 2, NULL, NULL, NULL),
(332, 'F4- 203', 2, NULL, NULL, NULL),
(333, 'F4- 204', 2, NULL, NULL, NULL),
(334, 'F4- 205', 2, NULL, NULL, NULL),
(335, 'F4- 206', 2, NULL, NULL, NULL),
(336, 'F4- 207', 2, NULL, NULL, NULL),
(337, 'F4- 208', 2, NULL, NULL, NULL),
(338, 'F4- 209', 2, NULL, NULL, NULL),
(339, 'F4- 210', 2, NULL, NULL, NULL),
(340, 'F4- 211', 2, NULL, NULL, NULL),
(341, 'F4- 212', 2, NULL, NULL, NULL),
(342, 'F4- 213', 2, NULL, NULL, NULL),
(343, 'F4- 214', 2, NULL, NULL, NULL),
(344, 'A1- 201', 2, NULL, NULL, NULL),
(345, 'A1- 202', 2, NULL, NULL, NULL),
(346, 'A1- 203', 2, NULL, NULL, NULL),
(347, 'A1- 204', 2, NULL, NULL, NULL),
(348, 'A1- 205', 2, NULL, NULL, NULL),
(349, 'A1- 206', 2, NULL, NULL, NULL),
(350, 'B1- 201', 2, NULL, NULL, NULL),
(351, 'B1- 202', 2, NULL, NULL, NULL),
(352, 'B1- 203', 2, NULL, NULL, NULL),
(353, 'B1- 204', 2, NULL, NULL, NULL),
(354, 'B1- 205', 2, NULL, NULL, NULL),
(355, 'B1- 206', 2, NULL, NULL, NULL),
(356, 'B1- 207', 2, NULL, NULL, NULL),
(357, 'B1- 208', 2, NULL, NULL, NULL),
(358, 'B1- 209', 2, NULL, NULL, NULL),
(359, 'B1- 210', 2, NULL, NULL, NULL),
(360, 'B1- 211', 2, NULL, NULL, NULL),
(361, 'B1- 212', 2, NULL, NULL, NULL),
(362, 'B1- 213', 2, NULL, NULL, NULL),
(363, 'B1- 214', 2, NULL, NULL, NULL),
(364, 'B2- 201', 2, NULL, NULL, NULL),
(365, 'B2- 202', 2, NULL, NULL, NULL),
(366, 'B2- 203', 2, NULL, NULL, NULL),
(367, 'B2- 204', 2, NULL, NULL, NULL),
(368, 'B2- 215', 2, NULL, NULL, NULL),
(369, 'B2- 216', 2, NULL, NULL, NULL),
(370, 'A2- 201', 2, NULL, NULL, NULL),
(371, 'A2- 202', 2, NULL, NULL, NULL),
(372, 'A2- 203', 2, NULL, NULL, NULL),
(373, 'A2- 204', 2, NULL, NULL, NULL),
(374, 'A2- 205', 2, NULL, NULL, NULL),
(375, 'A2- 206', 2, NULL, NULL, NULL),
(376, 'A2- 207', 2, NULL, NULL, NULL),
(377, 'A2- 208', 2, NULL, NULL, NULL),
(378, 'A2- 209', 2, NULL, NULL, NULL),
(379, 'A2- 210', 2, NULL, NULL, NULL),
(380, 'B2- 205', 2, NULL, NULL, NULL),
(381, 'B2- 206', 2, NULL, NULL, NULL),
(382, 'B2- 207', 2, NULL, NULL, NULL),
(383, 'B2- 208', 2, NULL, NULL, NULL),
(384, 'B2- 209', 2, NULL, NULL, NULL),
(385, 'B2- 210', 2, NULL, NULL, NULL),
(386, 'B2- 211', 2, NULL, NULL, NULL),
(387, 'B2- 212', 2, NULL, NULL, NULL),
(388, 'B2- 213', 2, NULL, NULL, NULL),
(389, 'B2- 214', 2, NULL, NULL, NULL),
(390, 'A3- 201', 2, NULL, NULL, NULL),
(391, 'A3- 202', 2, NULL, NULL, NULL),
(392, 'A3- 203', 2, NULL, NULL, NULL),
(393, 'A3- 204', 2, NULL, NULL, NULL),
(394, 'A3- 205', 2, NULL, NULL, NULL),
(395, 'A3- 206', 2, NULL, NULL, NULL),
(396, 'A3- 207', 2, NULL, NULL, NULL),
(397, 'A3- 208', 2, NULL, NULL, NULL),
(398, 'A3- 209', 2, NULL, NULL, NULL),
(399, 'A3- 210', 2, NULL, NULL, NULL),
(400, 'A3- 211', 2, NULL, NULL, NULL),
(401, 'A3- 212', 2, NULL, NULL, NULL),
(402, 'A3- 213', 2, NULL, NULL, NULL),
(403, 'A3- 214', 2, NULL, NULL, NULL),
(404, 'A3- 215', 2, NULL, NULL, NULL),
(405, 'A4- 201', 2, NULL, NULL, NULL),
(406, 'A4- 202', 2, NULL, NULL, NULL),
(407, 'A4- 203', 2, NULL, NULL, NULL),
(408, 'A4- 204', 2, NULL, NULL, NULL),
(409, 'A4- 205', 2, NULL, NULL, NULL),
(410, 'A4- 206', 2, NULL, NULL, NULL),
(411, 'A4- 207', 2, NULL, NULL, NULL),
(412, 'B3- 201', 2, NULL, NULL, NULL),
(413, 'B3- 202', 2, NULL, NULL, NULL),
(414, 'B3- 203', 2, NULL, NULL, NULL),
(415, 'B3- 204', 2, NULL, NULL, NULL),
(416, 'B3- 205', 2, NULL, NULL, NULL),
(417, 'B3- 206', 2, NULL, NULL, NULL),
(418, 'B3- 207', 2, NULL, NULL, NULL),
(419, 'B3- 208', 2, NULL, NULL, NULL),
(420, 'B3- 209', 2, NULL, NULL, NULL),
(421, 'B3- 210', 2, NULL, NULL, NULL),
(422, 'B3- 211', 2, NULL, NULL, NULL),
(423, 'B3- 212', 2, NULL, NULL, NULL),
(424, 'B3- 213', 2, NULL, NULL, NULL),
(425, 'B3- 214', 2, NULL, NULL, NULL),
(426, 'B4- 201', 2, NULL, NULL, NULL),
(427, 'B4- 202', 2, NULL, NULL, NULL),
(428, 'B4- 203', 2, NULL, NULL, NULL),
(429, 'B4- 204', 2, NULL, NULL, NULL),
(430, 'B4- 205', 2, NULL, NULL, NULL),
(431, 'B4- 206', 2, NULL, NULL, NULL),
(432, 'B4- 207', 2, NULL, NULL, NULL),
(433, 'B4- 208', 2, NULL, NULL, NULL),
(434, 'B4- 209', 2, NULL, NULL, NULL),
(435, 'B4- 210', 2, NULL, NULL, NULL),
(436, 'B4- 211', 2, NULL, NULL, NULL),
(437, 'B4- 212', 2, NULL, NULL, NULL),
(438, 'B4- 213', 2, NULL, NULL, NULL),
(439, 'B4- 214', 2, NULL, NULL, NULL),
(440, 'F1- 201', 2, NULL, NULL, NULL),
(441, 'F1- 202', 2, NULL, NULL, NULL),
(442, 'F1- 203', 2, NULL, NULL, NULL),
(443, 'F1- 204', 2, NULL, NULL, NULL),
(444, 'F1- 205', 2, NULL, NULL, NULL),
(445, 'F1- 206', 2, NULL, NULL, NULL),
(446, 'F1- 207', 2, NULL, NULL, NULL),
(447, 'F1- 208', 2, NULL, NULL, NULL),
(448, 'F1- 209', 2, NULL, NULL, NULL),
(449, 'F1- 210', 2, NULL, NULL, NULL),
(450, 'F2- 201', 2, NULL, NULL, NULL),
(451, 'F2- 202', 2, NULL, NULL, NULL),
(452, 'F2- 203', 2, NULL, NULL, NULL),
(453, 'F2- 204', 2, NULL, NULL, NULL),
(454, 'F2- 205', 2, NULL, NULL, NULL),
(455, 'F2- 206', 2, NULL, NULL, NULL),
(456, 'F2- 207', 2, NULL, NULL, NULL),
(457, 'F2- 208', 2, NULL, NULL, NULL),
(458, 'F2- 209', 2, NULL, NULL, NULL),
(459, 'F2- 210', 2, NULL, NULL, NULL),
(460, 'F2- 211', 2, NULL, NULL, NULL),
(461, 'F2- 212', 2, NULL, NULL, NULL),
(462, 'E1- 201', 2, NULL, NULL, NULL),
(463, 'E1- 202', 2, NULL, NULL, NULL),
(464, 'E1- 203', 2, NULL, NULL, NULL),
(465, 'E1- 204', 2, NULL, NULL, NULL),
(466, 'E1- 205', 2, NULL, NULL, NULL),
(467, 'E1- 206', 2, NULL, NULL, NULL),
(468, 'E2- 201', 2, NULL, NULL, NULL),
(469, 'E2- 202', 2, NULL, NULL, NULL),
(470, 'E2- 203', 2, NULL, NULL, NULL),
(471, 'E2- 204', 2, NULL, NULL, NULL),
(472, 'E2- 205', 2, NULL, NULL, NULL),
(473, 'E2- 206', 2, NULL, NULL, NULL),
(474, 'E2- 207', 2, NULL, NULL, NULL),
(475, 'E2- 208', 2, NULL, NULL, NULL),
(476, 'E2- 209', 2, NULL, NULL, NULL),
(477, 'E2- 210', 2, NULL, NULL, NULL),
(478, 'E2- 211', 2, NULL, NULL, NULL),
(479, 'E2- 212', 2, NULL, NULL, NULL),
(480, 'D3- 201', 2, NULL, NULL, NULL),
(481, 'D3- 202', 2, NULL, NULL, NULL),
(482, 'D3- 203', 2, NULL, NULL, NULL),
(483, 'D3- 204', 2, NULL, NULL, NULL),
(484, 'D3- 205', 2, NULL, NULL, NULL),
(485, 'D3- 206', 2, NULL, NULL, NULL),
(486, 'D3- 207', 2, NULL, NULL, NULL),
(487, 'D3- 208', 2, NULL, NULL, NULL),
(488, 'D4- 201', 2, NULL, NULL, NULL),
(489, 'D4- 202', 2, NULL, NULL, NULL),
(490, 'D4- 203', 2, NULL, NULL, NULL),
(491, 'D4- 204', 2, NULL, NULL, NULL),
(492, 'D4- 205', 2, NULL, NULL, NULL),
(493, 'D4- 206', 2, NULL, NULL, NULL),
(494, 'D4- 207', 2, NULL, NULL, NULL),
(495, 'D4- 208', 2, NULL, NULL, NULL),
(496, 'D4- 209', 2, NULL, NULL, NULL),
(497, 'D4- 210', 2, NULL, NULL, NULL),
(498, 'D1- 201', 2, NULL, NULL, NULL),
(499, 'D1- 202', 2, NULL, NULL, NULL),
(500, 'D1- 203', 2, NULL, NULL, NULL),
(501, 'D1- 204', 2, NULL, NULL, NULL),
(502, 'D1- 205', 2, NULL, NULL, NULL),
(503, 'D1- 206', 2, NULL, NULL, NULL),
(504, 'D1- 207', 2, NULL, NULL, NULL),
(505, 'D1- 208', 2, NULL, NULL, NULL),
(506, 'D1- 209', 2, NULL, NULL, NULL),
(507, 'D1- 210', 2, NULL, NULL, NULL),
(508, 'D2- 201', 2, NULL, NULL, NULL),
(509, 'D2- 202', 2, NULL, NULL, NULL),
(510, 'D2- 203', 2, NULL, NULL, NULL),
(511, 'D2- 204', 2, NULL, NULL, NULL),
(512, 'D2- 205', 2, NULL, NULL, NULL),
(513, 'D2- 206', 2, NULL, NULL, NULL),
(514, 'D2- 207', 2, NULL, NULL, NULL),
(515, 'D2- 208', 2, NULL, NULL, NULL),
(516, 'C1- 201', 2, NULL, NULL, NULL),
(517, 'C1- 202', 2, NULL, NULL, NULL),
(518, 'C1- 203', 2, NULL, NULL, NULL),
(519, 'C1- 204', 2, NULL, NULL, NULL),
(520, 'C1- 205', 2, NULL, NULL, NULL),
(521, 'C1- 206', 2, NULL, NULL, NULL),
(522, 'C2- 201', 2, NULL, NULL, NULL),
(523, 'C2- 202', 2, NULL, NULL, NULL),
(524, 'C2- 203', 2, NULL, NULL, NULL),
(525, 'C2- 204', 2, NULL, NULL, NULL),
(526, 'C2- 205', 2, NULL, NULL, NULL),
(527, 'C2- 206', 2, NULL, NULL, NULL),
(528, 'C2- 207', 2, NULL, NULL, NULL),
(529, 'C2- 208', 2, NULL, NULL, NULL),
(530, 'C2- 209', 2, NULL, NULL, NULL),
(531, 'C2- 210', 2, NULL, NULL, NULL),
(532, 'C2- 211', 2, NULL, NULL, NULL),
(533, 'C2- 212', 2, NULL, NULL, NULL),
(534, 'C3- 201', 2, NULL, NULL, NULL),
(535, 'C3- 202', 2, NULL, NULL, NULL),
(536, 'C3- 203', 2, NULL, NULL, NULL),
(537, 'C3- 204', 2, NULL, NULL, NULL),
(538, 'C3- 205', 2, NULL, NULL, NULL),
(539, 'C3- 206', 2, NULL, NULL, NULL),
(540, 'C3- 207', 2, NULL, NULL, NULL),
(541, 'C3- 208', 2, NULL, NULL, NULL),
(542, 'C3- 209', 2, NULL, NULL, NULL),
(543, 'C3- 210', 2, NULL, NULL, NULL),
(544, 'C3- 211', 2, NULL, NULL, NULL),
(545, 'C3- 212', 2, NULL, NULL, NULL),
(546, 'C3- 213', 2, NULL, NULL, NULL),
(547, 'C3- 214', 2, NULL, NULL, NULL),
(548, 'C3- 215', 2, NULL, NULL, NULL),
(549, 'C3- 216', 2, NULL, NULL, NULL),
(550, 'C4- 201', 2, NULL, NULL, NULL),
(551, 'C4- 202', 2, NULL, NULL, NULL),
(552, 'C4- 203', 2, NULL, NULL, NULL),
(553, 'C4- 204', 2, NULL, NULL, NULL),
(554, 'C4- 205', 2, NULL, NULL, NULL),
(555, 'C4- 206', 2, NULL, NULL, NULL);











INSERT INTO "articles" ("id", "nom", "details", "user_id", "categorie_id", "created_at", "updated_at") VALUES
(1, 'Grande boutique en attente attribution', NULL, NULL, NULL, NULL, NULL),
(2, 'Quincailleries', NULL, NULL, NULL, NULL, NULL),
(3, 'Boutiques pour Appareil Electronique', NULL, NULL, NULL, NULL, NULL),
(4, 'Boutiques pour Appareil Electroménager', NULL, NULL, NULL, NULL, NULL),
(5, 'Boutiques pour Fourniture de bureau , librairie, imprimerie et bureautique', NULL, NULL, NULL, NULL, NULL),
(6, 'Boutiques pour Agence de voyage et de fret', NULL, NULL, NULL, NULL, NULL),
(7, 'Boutiques pour Caviste', NULL, NULL, NULL, NULL, NULL),
(8, 'Boutiques pour Charcuterie, sandwicherie, patisserie et cremerie', NULL, NULL, NULL, NULL, NULL),
(9, 'Boutiques pour Vivre et divers (pattes, boite de conserve, épicerie et autes produits sec en gros)', NULL, NULL, NULL, NULL, NULL),
(10, 'Boutiques pour Chambre froide Négatives', NULL, NULL, NULL, NULL, NULL),
(11, 'Boutiques pour Chambre froide Positives', NULL, NULL, NULL, NULL, NULL),
(12, 'Location dépôt', NULL, NULL, NULL, NULL, NULL),
(13, 'Locaux sous escalier', NULL, NULL, NULL, NULL, NULL),
(14, 'Boutiques pour Décoration et Ornement interieur maison', NULL, NULL, NULL, NULL, NULL),
(15, 'Boutiques pour Casserollerie et ornement', NULL, NULL, NULL, NULL, NULL),
(16, 'Boutiques pour Objet plastique', NULL, NULL, NULL, NULL, NULL),
(17, 'Boutiques pour Vivre sec en gros (Riz, poissons salé, poisson fumé, sac de fufu, sac de mais, etc…)', NULL, NULL, NULL, NULL, NULL),
(18, 'Boutique Hors Formats (ex banques)', NULL, NULL, NULL, NULL, NULL),
(19, 'Boutiques pour CAMBISTE, Bureau de Change et Mobile Money', NULL, NULL, NULL, NULL, NULL),
(20, 'Boutiques pour Parfumerie Homme et femme', NULL, NULL, NULL, NULL, NULL),
(21, 'Boutiques pour Produits cosmétiques Homme Femme', NULL, NULL, NULL, NULL, NULL),
(22, 'Boutiques pour Mercerie', NULL, NULL, NULL, NULL, NULL),
(23, 'Boutiques pour Atelier de coutures', NULL, NULL, NULL, NULL, NULL),
(24, 'Boutiques pour Produits capilaires et et saon de coiffures', NULL, NULL, NULL, NULL, NULL),
(25, 'Boutiques pour Magasin de chaussure Femme / Homme', NULL, NULL, NULL, NULL, NULL),
(26, 'Boutiques pour Mode (Habillement & Maroquinnerie)', NULL, NULL, NULL, NULL, NULL),
(27, 'Boutiques pour Banques', NULL, NULL, NULL, NULL, NULL),
(28, 'Zone TOMBOLA / Fripperie', NULL, NULL, NULL, NULL, NULL),
(29, 'Zone kiosque', NULL, NULL, NULL, NULL, NULL),
(30, 'Zone œuvre d\'art', NULL, NULL, NULL, NULL, NULL),
(31, 'Restaurant unique', NULL, NULL, NULL, NULL, NULL),
(32, 'Stand  pour plusieurs restaurants MALEWA', NULL, NULL, NULL, NULL, NULL),
(33, 'Légume, épice, Fruit,Produit agricoles, huiles, etc…', NULL, NULL, NULL, NULL, NULL),
(34, 'Riz, Haricot, Farine, Courges, Céréales, etc …', NULL, NULL, NULL, NULL, NULL),
(35, 'Lait, Œuf, Fromage, Pattes, boite de conserve,sucre, etc...', NULL, NULL, NULL, NULL, NULL),
(36, 'Vin, Alcool, Jus, boisson locale / importées, \r\nEau, Spiritueux, etc …', NULL, NULL, NULL, NULL, NULL),
(37, 'Boucherie et poissonnerie', NULL, NULL, NULL, NULL, NULL),
(38, 'Poisson salé, Poisson fumé, viande fumée, \r\nEtc…', NULL, NULL, NULL, NULL, NULL),
(39, 'Sandwicherie ou autres activités à définir', NULL, NULL, NULL, NULL, NULL),
(40, 'Tabac', NULL, NULL, NULL, NULL, NULL),
(41, 'Vente de sac vides de tout type, \r\nbouteille vide, etc ...', NULL, NULL, NULL, NULL, NULL),
(42, 'Quincaillerie', NULL, NULL, NULL, NULL, NULL),
(43, 'Vente de produits traditionnelles (médical et autres)', NULL, NULL, NULL, NULL, NULL),
(44, 'Habillement Homme tout inclus', NULL, NULL, NULL, NULL, NULL),
(45, 'Habillement Femme tout inclus', NULL, NULL, NULL, NULL, NULL),
(46, 'Pagne', NULL, NULL, NULL, NULL, NULL),
(47, 'Bijoux', NULL, NULL, NULL, NULL, NULL),
(48, 'Libraire et Bureautique', NULL, NULL, NULL, NULL, NULL),
(49, 'Hygiène, Beauté, Parfumerie, Entretien et Nettoyage', NULL, NULL, NULL, NULL, NULL),
(50, 'Produit pour bébé, tout inclus', NULL, NULL, NULL, NULL, NULL),
(51, 'Produit cosmétique traditionnel', NULL, NULL, NULL, NULL, NULL),
(52, 'Produits cosmétiques courant', NULL, NULL, NULL, NULL, NULL),
(53, 'Affectation à déterminer', NULL, NULL, NULL, NULL, NULL);
