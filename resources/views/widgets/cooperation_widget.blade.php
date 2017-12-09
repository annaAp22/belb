<section class="container cooperation">
  <div class="cooperation__wrap">
    <form class="cooperation__form js-form-ajax " action="{{ route('ajax.cooperation') }}"
          method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="is_multiple" value="1">
      <h3 class="cooperation__form-title">Оставьте заявку на сотрудничество с брендом Belberg.</h3>
      <p class="cooperation__form-text">Belberg ценит партнерские отношения, и всегда рад новому сотрудничеству.</p>
      <div class="cooperation__form-line ">
        {{--<label>Ваше имя: <span class="mod-col-or">*</span></label>--}}
        <input class="js-required-fields input input_text" type="text" name="name" placeholder="Ваше имя..." >
      </div>
      <div class="cooperation__form-line">
        <input class="js-required-fields js-phone input " type="text" name="phone"
               placeholder="Ваш номер телефона...">
      </div>
      <div class="cooperation__form-line">
        <input class="js-required-fields input " type="text" name="email"
               placeholder="Ваш E-mail...">
      </div>
      <div class="cooperation__form-line cooperation__form-line--r ">
        <label class="radio radio_box">
          <input class="js-required-fields" name="rating"  type="checkbox" value=1><span
              class="fake-input"><span></span></span><span class="label">Я соглас(ен/на) на <a target="_blank"
                                                                                               href="{{route('page', ['sysname' => 'polzovatelskoe-soglashenie'])}}">обработку персональных данных</a></span>
        </label>
      </div>
      <button class="btn btn_blue cooperation__form-btn " type="submit">Узнать условия</button>
    </form>
  </div>
  {{--<div class="main-callback__image">--}}
    {{--<img  src="/img/callb-min.jpg" alt=""/>--}}
  {{--</div>--}}
</section>