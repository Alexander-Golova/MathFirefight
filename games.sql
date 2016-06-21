CREATE DATABASE games DEFAULT CHARACTER SET utf8;

USE games;

CREATE TABLE user
(
  user_id SERIAL,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  registration_date DATE,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY(user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE task
(
  task_id SERIAL,
  text_problem VARCHAR(1022),
  response_task VARCHAR(255) NOT NULL,
  PRIMARY KEY(task_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE user_game
(
  user_game_id SERIAL,
  position BIGINT UNSIGNED DEFAULT 1,
  user_id BIGINT UNSIGNED NOT NULL,     
  lives INTEGER  DEFAULT 100,
  hit INTEGER  DEFAULT 20,
  chance_hit INTEGER DEFAULT 2,
  chance_miss INTEGER DEFAULT 2,
  target INTEGER DEFAULT 0,
  PRIMARY KEY(user_game_id),
  FOREIGN KEY(user_id) REFERENCES user(user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE best_games
(
  best_games_id SERIAL,
  user_id BIGINT UNSIGNED NOT NULL,
  lives INTEGER,
  PRIMARY KEY(best_games_id),
  FOREIGN KEY(user_id) REFERENCES user(user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE popular_target
(
  popular_target_id SERIAL,
  user_id BIGINT UNSIGNED NOT NULL,
  target INTEGER,
  PRIMARY KEY(popular_target_id),
  FOREIGN KEY(user_id) REFERENCES user(user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE archive_task
(
  archive_task_id SERIAL,
  text_problem VARCHAR(1022),
  response_task VARCHAR(255) NOT NULL,
  PRIMARY KEY(archive_task_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO user
  (first_name, last_name, email, registration_date, password)
VALUES
  ('Александр', 'Козлов', 'al.iv.kozlov@yandex.ru', '2016-06-01', '12345'),
  ('Никита', 'Егоров', 'eligant.ru@gmail.com', '2016-06-02', 'qwerty'),
  ('Дональд', 'Кнут', 'donaldErvinKnuth@gmail.com', '2016-06-03', 'qwertyui'),
  ('Михаил', 'Романов', 'miha@rambler.ru', '2016-06-04', 'poiuyt'),
  ('Барак', 'Обама', 'barack@whitehouse.com', '2016-06-05', '123456'),
  ('Квентин', 'Тарантино', 'quentin@mail.ru', '2016-06-06', 'qawsed'),
  ('Тим', 'Рот', 'timroth@yandex.ru', '2016-06-07', 'qwerty'),
  ('Харви', 'Кейтель', 'harvey@rambler.ru', '2016-06-08', '123'),
  ('Мартин', 'Кинг', 'martin@mail.ru', '2016-06-09', '12345'),
  ('Киану', 'Ривз', 'keanu@rambler.ru', '2016-06-10', '123321');
	

INSERT INTO user_game
  (user_id)
VALUES
  ('1'),
  ('2'),
  ('3'),
  ('4'),
  ('5'),
  ('6'),
  ('7'),
  ('8'),
  ('9'),
  ('10');

INSERT INTO best_games
  (user_id, lives)
VALUES
  ('1', '66'),
  ('2', '91'),
  ('3', '102'),
  ('4', '12'),
  ('5', '14'),
  ('6', '22'),
  ('7', '86'),
  ('8', '63'),
  ('9', '10'),
  ('10', '6');

INSERT INTO popular_target
  (user_id, target)
VALUES
  ('1', '12'),
  ('2', '10'),
  ('3', '8'),
  ('4', '41'),
  ('5', '16'),
  ('6', '42'),
  ('7', '12'),
  ('8', '11'),
  ('9', '11'),
  ('10', '66');

INSERT INTO archive_task
  (text_problem, response_task)
VALUES
  ('Каким наименьшим количеством банкнот в 3 и 5 фишек можно набрать сумму 37 фишек?', '9'),
  ('Найдите наименьшее возможное число членов кружка, если известно, что девочек в нем меньше 50%, но больше 40%?', '7'),
  ('Десяти собакам и кошкам скормили 56 котлет. Каждой собаке досталось 6 котлет, каждой кошке - 5. Сколько было собак?', '6'),
  ('Мама положила на стол сливы и сказал детям, чтобы они, вернувшись со школы, разделили их поровну. Первой пришла Аня, взяла треть слив и ушла.
    Потом вернулся из школы Боря, взял треть оставшихся слив и ушел. Затем пришел Витя и взял 4 сливы – треть от числа слив, которые он увидел.
    Сколько слив оставила мама?', '27'),
  ('Турист проехал автобусом на 80 км больше, чем прошел пешком. Поездом он проехал на 120 км больше, чем автобусом.
    Какое расстояние он проехал автобусом, если поездом он преодолел в 6 раз большее расстояние, чем пешком?', '120'),
  ('Найдите наименьшее натуральное число, кратное 100, сумма цифр которого равна 100.', '19999999999900'),
  ('Джеймс отправился в путь. В первый день он прошел одну треть всего пути. Во второй день он прошел одну треть остатка.
    И в третий день он прошел одну треть нового остатка. В результате ему осталось пройти еще 32 км.
    Сколько километров он прошел в первый день?', '108'),
  ('На доске написаны несколько ненулевых чисел. Каждое из них равно полусумме остальных. Сколько чисел на доске?', '3'),
  ('В полдень самолет вылетел из столицы в город Энск и приземлился там в 14:00 местного времени.
    В полночь по местному времени он вылетел обратно и оказался в столице в 06:00. Сколько времени длился полет?', '4'),
  ('Сколько дедушке лет, столько месяцев внучке. Вместе им 91 год. Сколько лет дедушке?', '84'),
  ('Корова вчетверо дороже собаки, а лошадь вчетверо дороже коровы. Собака, две коровы и лошадь стоят 200 р. Сколько стоит корова?', '32'),
  ('Сколько раз произведение всех натуральных чисел от 1 до 100 можно разделить на число 7 нацело?', '16'),
  ('По какой цене за кг нужно продавать смесь конфет "Солнышко" и "Луна", если цена "Солнышка" 50 рублей за кг, цена "Луны", - 70 рублей,
    и в смеси "Луны" втрое больше, чем "Солнышка"?', '65'),
  ('Если на круговом маршруте работают два автобуса, то интервал движения 25 мин. Сколько дополнительных автобусов нужно
    пустить на маршрут, чтобы интервал движения уменьшился на 60%?', '3'),
  ('Три курицы за три дня снесли три яйца. Сколько яиц снесут 12 куриц за 12 дней?', '48'),
  ('Какой угол образуют часовая и минутная стрелки в двадцать минут первого?', '110'),
  ('Первая цифра трехзначного числа равна 4. Если ее перенести в конец, получится число, составляющее 3/4 от исходного. Найдите исходное число.', '432'),
  ('Из двух одинаковых железных проволок кузнец сковал по одной цепи. Первая содержит 80 одинаковых звеньев, а вторая — 100.
    Каждое звено первой цепи на 5 грамм тяжелее каждого звена второй цепи. Какова была масса каждой проволоки?', '2'),
  ('В ящике лежат в беспорядке 20 перчаток: 5 пар черных и 5 пар коричневых. Какое наименьшее количество перчаток надо взять не глядя, чтобы
    из них можно было бы наверняка выбрать две пары одноцветных перчаток?', '12'),
  ('Из числа 12345123451234512345 вычеркните 10 цифр так, чтобы осталось наименьшее возможное число. Напишите оставшееся число', '1112312345');

INSERT INTO task
  (text_problem, response_task)
VALUES
  ('На соревновании по бегу на дистанцию 10 км Джонни Джоггер пробежал 9641 м, потом прошел 3456 дм, наконец, прополз 12340 мм и остановился,
    не в силах двигаться дальше. Сколько сантиметров ему осталось до финиша?', '106'),
  ('Говядина без костей стоит 300 рублей за килограмм, говядина с костями - 260 рублей за килограмм, а кости без говядины - 50 рублей
    за килограмм. Сколько граммов костей в килограмме говядины с костями?', '160'),
  ('На дистанции 200 метров жираф обгоняет носорога на 30 метров, а носорог гиппопотама - на 20 метров.
    На сколько жираф обгонит гиппопотама на дистанции 200 метров?', '47'),
  ('Найдите наименьшее натуральное число, куб которого оканчивается на 2000', '80'),    
  ('Диагональ делит четырёхугольник с периметром 31 см на два треугольника с периметрами 21 см и 30 см.
    Найдите длину этой диагонали', '10'),
  ('Карлсон влил стакан малинового сиропа в банку с водой. Получился 25% раствор морса. Потом он добавил в банку еще один стакан сиропа.
    Раствор какой концентрации получился в результате?', '40'), 
  ('На игральном кубике общее число точек на любых двух противоположных гранях равно 7. Мила склеила столбик из 6 таких кубиков и
    подсчитала общее число точек на всех наружных гранях. Какое самое большое число она могла получить?', '96'),    
  ('Книга в переплёте стоит 5 рублей 50 копеек. Сколько копеек стоит переплёт, если книга дороже переплёта на 5 рублей?', '25'),
  ('Найдите наименьшее составное число, которое не делится ни на одно из натуральных чисел от двух до десяти', '121'),  
  ('У Йозефа 100 мышей, некоторые из них белые, некоторые - серые. Известно, что хотя бы одна мышь серая, а из любых двух мышей хотя бы
    одна - белая. Сколько белых мышей у Йозефа?', '99');  
	