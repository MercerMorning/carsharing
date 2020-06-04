# Каршеринг
Необходимо реализовать каждый тариф в своем классе. У каждого тарифа две основные характеристики - цена за 1 км, цена за 1 минуту. Каждый тариф обязан иметь метод для подсчета цены поездки. В некоторых тарифах возможно использование дополнительных услуг. Задача - посчитать цену, которую получит пользователь, если проедет Х км и Y минут по тарифу Z.
### Тариф базовый
- Цена за 1 км = 10 рублей
- Цена за 1 км = 10 рублей
### Тариф почасовой
- Цена за 1 км = 0
- Цена за 60 минут = 200 рублей
- Округление до 60 минут в большую сторону
### Тариф студенческий
- Цена за 1 км = 4 рубля
- Цена за 1 минуту = 1 рубль
### Дополнительные услуги (трейты):
- Gps в салон - 15 рублей в час, минимум 1 час. Округление в большую сторону
- Дополнительный водитель - 100 рублей единоразово