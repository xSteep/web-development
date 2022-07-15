<div class="form">
  <div>
    <img class="form__images" src="images/Welcome.svg">
  </div>
  <div class="form__header">Записаться на курс</div>
  <form method="POST" action="register.php">
    <div class="form__fields fields">
      <label>
        <input required class="fields__window" type="text" name="name" placeholder="Ваше имя"/>
      </label>
      <label>
        <input required class="fields__window" type="email" name="email" placeholder="Email"/>
      </label>
      <label>
        <select required name="activity" class="fields__window">
          <option style="display: none" selected disabled>Деятельность</option>
          <option value="programmer">Программист</option>
          <option value="designer">Дизайнер</option>
          <option value="marketer">Маркетолог</option>
        </select>
      </label>
      <div class="fields__jackdaw">
        <input type="checkbox" id="subscribeNews" name="subscribe" value="newsletter" class="jackdaw__checkbox"/>
        <label for="subscribeNews" class="jackdaw__text">Согласен получать информационные материалы о старте курса</label>
      </div>
      <div>
        <input class="fields__button fields__text" type="submit" value="Записаться на курс"/>
      </div>
    </div>
  </form>
</div>