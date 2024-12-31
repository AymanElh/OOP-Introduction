USE FUT_Champions;



INSERT INTO players (first_name, last_name, country_id, club_id, rating, position)
VALUES
('Lionel', 'Messi', 7, FLOOR(RAND() * 10) + 1, 93, 'RW'),
('Cristiano', 'Ronaldo', 52, FLOOR(RAND() * 10) + 1, 92, 'RW'),
('Neymar', 'Jr.', 55, FLOOR(RAND() * 10) + 1, 91, 'RW'),
('Kylian', 'Mbappé', 57, FLOOR(RAND() * 10) + 1, 91, 'RW'),
('Robert', 'Lewandowski', 77, FLOOR(RAND() * 10) + 1, 90, 'RW'),
('Kevin', 'De Bruyne', 19, FLOOR(RAND() * 10) + 1, 91, 'CM'),
('Mohamed', 'Salah', 58, FLOOR(RAND() * 10) + 1, 90, 'RW'),
('Erling', 'Haaland', 72, FLOOR(RAND() * 10) + 1, 89, 'RW'),
('Virgil', 'van Dijk', 72, FLOOR(RAND() * 10) + 1, 89, 'LB'),
('Luka', 'Modrić', 48, FLOOR(RAND() * 10) + 1, 88, 'CM'),
('Harry', 'Kane', 85, FLOOR(RAND() * 10) + 1, 89, 'RW'),
('Karim', 'Benzema', 57, FLOOR(RAND() * 10) + 1, 88, 'RW'),
('N\'Golo', 'Kanté', 57, FLOOR(RAND() * 10) + 1, 88, 'CM'),
('Manuel', 'Neuer', 73, FLOOR(RAND() * 10) + 1, 90, 'GK'),
('Casemiro', 'Silva', 55, FLOOR(RAND() * 10) + 1, 87, 'CM'),
('Joshua', 'Kimmich', 73, FLOOR(RAND() * 10) + 1, 88, 'CM'),
('Gianluigi', 'Donnarumma', 71, FLOOR(RAND() * 10) + 1, 89, 'GK'),
('Raheem', 'Sterling', 65, FLOOR(RAND() * 10) + 1, 86, 'RW'),
('Bruno', 'Fernandes', 52, FLOOR(RAND() * 10) + 1, 87, 'CM'),
('Antonio', 'Rudiger', 73, FLOOR(RAND() * 10) + 1, 87, 'RB');
