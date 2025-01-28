Разработать функционал на **Laravel 8+** c базой данных **MySQL**.

Реализовать вывод списка продуктов, просмотр карточки продукта, добавление,  редактирование и удаление продукта.

Создать таблицу «products».
ID
uint, autoincrement


    ARTICLE
    
    
    varchar(255), unique index
    
    
    NAME
    varchar(255)
    
    
    STATUS
    varchar(255)
    "available" | "unavailable"
    DATA
    jsonb
    несколько разных полей
    (например, Color и Size)
    на своё усмотрение
    
    
    timestamps
    
    
    
    
    soft deletes




**Создать Eloquent-модель «Product»**, связанную с таблицей «products».
В модели реализовать **Local Scope** для получения только доступных продуктов (STATUS = “available”).

**Сделать валидацию** создания и редактирования:
NAME — обязательное поле, длиной не менее 10 символов;
ARTICLE — обязательное поле, только латинские символы и цифры, уникальное в таблице.

**Создать роль администратора**, который может редактировать артикул, остальным пользователям можно редактировать всё, кроме артикула.
Роль пользователя можно узнать из настроек (config(‘products.role’)).
**Реализовать валидацию и проверку прав** (контроллер, модель, отдельный сервис — на своё усмотрение).

При создании продукта реализовать отправку на заданный в конфигурации Email (config(‘products.email’)) уведомления (Notification) о том, что продукт создан.
Уведомление должно отправляться через задачу (Job) в очереди (Queue).

Реализовать метод для **получения** списка продуктов по API в виде json.

Реализовать команду, которая будет запускаться каждую минуту через штатный механизм **Task Scheduling**. Команда берет в конфиге url (config(‘products.webhook’)) и отправляет туда **POST** запрос с информацией о продукте, с наибольшим ID. Для тестового endpoint можно использовать **http://webhook.site**.


**Интерфейс приложения реализовать самостоятельно, можно использовать фреймворки**. У продуктов должна быть картинка-плейсходер (не нужно реализовать CRUD на картинках, просто отобразите плейсхолдер (например, отсюда: https://placehold.co/)

**Готовое приложение выложить на GitHub / Bitbucket
Дополнительное преимущество: развернуть приложение онлайн и предоставить доступ**
