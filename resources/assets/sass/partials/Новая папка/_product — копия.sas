.product-detailed
  flex-grow: 1
  padding-top: 30px
  &__gallery
    //background-color: yellow
    +media-md(down)
      margin-top: 30px
      +col(24)
    +col-sm(24)
    +col-lg(9)
  &__details
    //background-color: yellowgreen
    +col(24)
    +col-lg(15)
    & > div
      height: 100%
  &__title
    +col(24)
    margin-bottom: 54px
    margin-top: 0
    font-weight: 700
    font-size: 32px
    color: #464646
    +media-md(down)
      font-size: 24px
      font-weight: 500


  &__column
    //background-color: cornflowerblue
    display: flex
    flex-wrap: wrap
    //+media-lg(up)
    //  flex-wrap: wrap
    &--left
      +col-lg(13)
    &--rigth
      +col-lg(11)
    +media-md(down)
      width: 100%
      flex-wrap: wrap
    &:nth-child(3)
      +media-lg(up)
        padding-left: 24px
    & > *:first-child
      +media-lg(up)
        margin-top: 0
    & > .product-rating
      +media-xs()
        +col(24)
      +media-md(down)
        +col(12)
        margin-top: 30px
        order: 1
  &__subtitle
    font-size: 14px
    color: #878787
    font-weight: 700
    margin-bottom: 15px
    & b
      color: #434343
    &_size
      margin-top: 20px
      +media-md(down)
        +col(24)
        order: 2
    &_des
      +media-md(down)
        +col(24)
        margin-top: 50px
  &__art
    display: flex
    flex-wrap: wrap
    //justify-content: space-between
    align-items: center
    width: 100%
    &>span>*
      vertical-align: bottom
    +media-md(down)
      +col(24)
    &_lg-up
      +hidden-md(down)
    &_md-down
      +hidden-lg(up)
  &__art-stock
    margin-left: 35px


  &__price
    +media-xs()
      +col(24)
    +media-md(down)
      +col(12)
      margin-top: 30px
    +media-lg(up)
      display: flex
      flex-direction: column
      align-items: flex-start
      margin-top: 20px
    & > *
      vertical-align: middle
    &.product__price
      .current
        font-size: 24px
        color: #212121
        & b
          font-size: 30px
          font-weight: 700
      .old-price
        position: static
        margin-left: 0
        font-size: 18px
        text-align: center
        top: auto
        left: auto
        line-height: 33px
        padding-right: 30px
        &:after
          top: 9px

  &__size
    padding-top: 0
    .popup-notice_size
      top: -132px
    +media-sm(down)
      +col(24)
    +media-md(down)
      +col(12)
      order: 3
  &__btn
    width: 100%
    +media-xs()
      +col(24)
    +media-md(up)
      +col(12)
    &_size
      color: #272727
      +media-md(down)
        order: 4
        line-height: 34px
      font-size: 14px
      padding: 10px
      & > span
        margin-left: 10px
    &_buy
      font-size: 14px
      line-height: 20px
      padding: 12px 2px
      +media-md(down)
        order: 5
        margin-top: 30px
      margin-top: 35px

    &_quick
      +media-md(down)
        order: 6
        margin-top: 30px
      margin-top: 20px
      font-size: 12px
      text-transform: uppercase


  &__share
    margin-top: auto
    +media-sm(down)
      +col(24)
    +media-md(down)
      +col(12)
      +offset-md(right,6)
      order: 7
      margin-top: 30px
  &__description
    margin-top: 20px
    margin-left: -24px
    border-bottom: 1px solid #dddddd
    +media-md(down)
      +col(24)
      border-left: none
      padding-left: 0
  &__delivery
    +media-md(down)
      order: -1
      +col(24)
      border-left: none
      border-top: 1px solid #dddddd
      margin-top: 30px
      padding: 20px 0
      & > div
        &:first-child
          width: 260px
          margin: 0 auto
  &__warranty
    +media-sm(down)
      flex-wrap: wrap
    +media-md(down)
      +col(24)
      border-left: none
      display: flex
      +align(between)
      padding-left: 0
.share
  display: flex
  +align(between)
  &__separator
    color: #c7c7c7
  &__link
    min-width: 20px
.product-gallery
  +media-sm(down)
    width: 100%
    flex-direction: column
  display: flex
  //align-items: flex-start
  &__navigation
    +media-sm(down)
      display: flex
      flex-wrap: wrap
      +align(between)
      order: 1
      margin-top: -18px
      z-index: 1
    +media-md(up)
      width: 92px
      & > button
        width: 100%
    +media-sm(down)
      & > button
        width: 52px
        &:first-child
          order: -2
          margin-right: 12px
          & > i
            transform: rotate(-90deg)
        &:last-child
          order: -1
          margin-left: 12px
          & > i
            transform: rotate(90deg)

  &__wrap
    overflow: hidden
    +media-sm(down)
      width: 100%
    +media-md(up)
      height: 292px
  &__track
    display: flex
    +media-md(up)
      flex-direction: column
      flex-grow: 0
    &:not(.js-dragged)
      transition: transform .3s ease
  &__thumb
    position: relative
    width: 100%
    height: 96px
    border-bottom: 1px solid #dddddd
    border-left: 1px solid #dddddd
    overflow: hidden
    +media-sm(down)
      border-top: 1px solid #dddddd
      border-left: none
      border-right: 1px solid #dddddd
      &:last-child
        border-left: 1px solid #dddddd
    background-color: #ffffff
    cursor: pointer
    transition: box-shadow .3s ease
    &:first-child
      border-top: 1px solid #dddddd
    & > img
      transform: translateZ(0)
      //+image-center()
      display: block
      width: 100%
    &:hover, &:focus, &.active
      box-shadow: 0 0 24px 0px rgba(0, 0, 0, 0.09)
      z-index: 1
      &:before
        background-color: #3c6aa9
        width: 6px
    &:before
      content: ""
      display: block
      position: absolute
      top: 0
      left: 0
      height: 100%
      width: 0
      transition: background-color .3s ease, width .3s ease
      z-index: 1

    &_video
      position: relative
      background-size: cover
      background-repeat: no-repeat
      background-position: center
      &__play
        position: absolute
        padding: 10px
        //background-color: #5a6daa
        top: 50%
        left: 50%
        transform: translate(-50%, -50%)

        &:before
          content: ""
          display: block
          width: 0
          height: 0
          border-style: solid
          border-width: 14.5px 0 14.5px 30px
          +media-lg(up)
            border-width: 10px 0 10px 20px
          border-color: transparent transparent transparent #5a6daa
          transform: rotate(360deg)
          transition: border-color .3s ease
      &:hover
        .product-gallery__thumb_video__play
          &:before
            border-color: transparent transparent transparent #fcd82f
  &__video
    +image-center()
    &:hover
      & + .product-gallery__thumb_video__play
        &:before
          border-color: transparent transparent transparent #fcd82f
  &__image-wrap
    position: relative
    display: block
    +media-sm(down)
      height: 332px
      width: 100%
    +media-md(up)
      height: 332px
      width: calc(100% - 92px)
    border: 1px solid #dddddd
  &__image
    +image-center()

  &__image-link
    display: none
    &.active
      display: block
.description-scroll
  height: 225px
  padding: 0 0 40px 24px
  border-left: 1px solid #dddddd
  ::-webkit-scrollbar
    width: 14px
  ::-webkit-scrollbar-track
    border-radius: 10px
    border-left: 6px solid #ffffff
    border-right: 6px solid #ffffff
    background-color: #dddddd
  ::-webkit-scrollbar-thumb
    border-radius: 10px
    background-color: #ebebeb
    &:hover
      background-color: #fcd82f
  //background image in sprite_main css
  ::-webkit-scrollbar-button
    background: url(data:image/pngbase64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAPCAYAAACMa21tAAABHElEQVRIS2NkGGSAcZC5h2HUQYRiZGiE0KVLl9b9//9fiJ2d3VdDQ+MzyFc3btzg/fnz52ZGRsZ3enp6QYR8iix/5swZLjY2tvVAM//9/v072MTE5Bsu/VhD6OLFi3uBGpyA+Oj379+9QJo5OTm3ASlrIN6vr68PkiMKgBzDysq6GWoeSM8+oKN8cTkKq4OgPtoK9JEDEB8DmQIMGSsgdQiIvYAO+kqMa5DNAao/AdVjATTrwK9fv7yxOQpnGiLVZ9gcCAtpkKf+/PkDDmkWFpZtUM/tA3rMGV0f3kQNi3uQJqCPAvHFPQ4HrQaKiwGj3dfCwuITSM2JEyf4gNG/Cch8DXRQKEkOIiZaqK1maGR7avuaFPNGQ4hQaAEAw810EAtWPwoAAAAASUVORK5CYII=) no-repeat
    border: 3px solid #ffffff
    width: 14px
    height: 11px
    &:start
      background-position: -23px -5px
    &:end
      background-position: -5px -5px

  &__body
    width: 100%
    height: 100%
    overflow-y: scroll
    font-size: 14px
    padding: 10px 20px 0 0
    color: #666666

  &__link
    display: block
    font-size: 14px
    color: #36b057
  &__param-title
    & > span, & > strong
      margin-right: 10px
    & > strong
      font-weight: 700
      color: #000000
    &_strong
      font-weight: 700
      color: #000000
  &__param-value
    font-weight: 500
    color: #666666
  &__mt
    margin-top: 10px
  &__color-wrap
    display: flex
    +align(between)
    & > *
      display: flex
      flex-grow: 1
      &:first-child
        margin-right: 15px
  &__color
    display: inline-block
    min-width: 18px
    height: 18px
    vertical-align: middle

// Warranty
.product-warranty
  border-left: 1px solid #dddddd
  border-bottom: 1px solid #dddddd
  padding-left: 24px
  +media-md(up)
    padding-top: 5px
    padding-bottom: 30px
  +media-sm(down)
    padding-bottom: 20px
  margin-left: -24px
  &__item
    display: flex
    +media-md(up)
      margin-top: 30px
    +media-sm(down)
      width: 100%
      margin-top: 20px
      &:first-child
        border-bottom: 1px solid #dddddd
        padding-bottom: 20px
    & > i
      margin-right: 28px
      min-width: 26px
      &.sprite_main-product_warranty-thumb-up
        margin-right: 20px
        min-width: 34px
  &__title
    font-size: 13px
    font-weight: 700
    color: #36b057
    margin-bottom: 5px
  &__note
    font-size: 12px
    color: #8c8c8c

// Delivery
.product-delivery
  color: #000000
  border-left: 1px solid #dddddd
  border-bottom: 1px solid #dddddd
  padding-left: 24px
  padding-right: 24px
  margin-left: -24px
  flex-grow: 1
  display: flex
  flex-wrap: wrap
  cursor: pointer
  transition: background-color .3s ease
  position: relative
  &__wrap
    width: 100%
    display: flex
    +align(between, center)
    & > i
      &:first-child
        margin-right: 20px
      &:last-child
        margin-left: auto
        transform: rotate(180deg)
        transition: transform .3s ease
  &:hover
    background-color: #f8f8f8
  &.active
    .product-delivery__wrap > i
      transform: rotate(0deg)
    .product-delivery__hidden
      padding-top: 10px
      padding-bottom: 20px
      max-height: 400px
      +media-md(down)
        border-top: 1px solid #dddddd
      +media-lg(up)
        border-bottom: 1px solid #dddddd
  &__title
    font-size: 16px
    font-weight: 700
    margin-right: 10px
  &__note
    font-size: 13px
  &__hidden
    cursor: auto
    +media-lg(up)
      left: -1px
      top: 82px
      border-left: 1px solid #dddddd
      position: absolute
      top: 100%
      margin-top: 1px
    +media-md(down)
      min-width: 100%
      margin-top: 20px
      margin-bottom: -20px
    background-color: #ffffff
    width: calc(100% + 1px)
    z-index: 2
    padding: 0 24px 0 24px
    +media-xs()
      padding-left: 60px
    font-size: 13px
    color: #878787
    max-height: 0
    overflow: hidden
    transition: padding .3s ease, max-height .3s ease
    & > div
      margin-top: 25px
  &__link > a
    font-weight: 700
  &__city
    & > span
      &:last-child
        cursor: pointer
        font-size: 14px
        color: #000000
        margin-left: 10px
        & > i
          transform: rotate(90deg) translateZ(0)
  &__store
    padding-top: 20px
    width: calc(100% + 80px + 24px)
    display: flex
    +align(start, center)
    border-top: 1px solid #dddddd
    & > span
      font-size: 14px
      color: #000000
      margin-left: 20px

// Product set
.product-set-title
  margin-top: 30px
  +col(24)
  font-size: 20px
  +media-sm(down)
    text-align: center
    font-size: 16px
  span
    &:first-child
      color: #000000
      +media-md(up)
        margin-right: 20px
      +media-sm(down)
        display: block
    &:last-child
      color: #969696

.product-set-banner
  margin-top: 30px
  +col(24)
  +col-lg(8)
  +col-xl(6)
  height: 350px
  background: url('/img/product-set-banner-min.jpg') top right no-repeat #fcd82f
  +media-xs(down)
    background-position: bottom right -15px
  &__title
    display: flex
    +align(start,center)
    margin-top: 50px
    font-weight: 900
    font-size: 22px
    text-transform: uppercase
    width: 100%
    padding-right: 70px
    span
      margin-left: 20px
  &__orange-cycle
    padding: 20px
    background-color: #fc942f
    +hidden-xs()
  &__text
    +media-sm(up)
      padding: 30px 150px 0 35px
    +media-xs(down)
      padding: 30px 120px 0 20px
    font-size: 14px
    color: #222222
    line-height: 24px

.product-set-goods
  +col(24)
  +col-lg(16)
  +col-xl(18)
.product-set-goods-large
  width: 100%

.products-carousel, .products-carousel-2
  position: relative
  margin-top: 30px
  display: flex
  +align(start,center)
  overflow: hidden
  +media-sm(down)
    flex-wrap: wrap
    +align(between)
    margin-top: -45px
  &_full-width
    +media-lg(up)
      margin-left: -47px
      margin-right: -47px
    & > .products-carousel__wrap
      overflow: visible
      &_ovh
        overflow: hidden
      &:before, &:after
        content: ""
        display: block
        position: absolute
        background-color: #fff
        width: 100%
        height: 100%
        top: 0
        z-index: 1
      &:before
        +media-md(up)
          left: calc(32px - 100%)
        +media-sm(down)
          left: 100%
      &:after
        +media-md(up)
          right: calc(32px - 100%)
        +media-sm(down)
          right: 100%
  & > button
    height: 80px
    position: relative
    z-index: 2
    &:first-child
      & > i
        transform: rotate(-90deg)
    &:last-child
      & > i
        transform: rotate(90deg)
    +media-sm(down)
      width: 52px
      height: 52px
      margin-bottom: 24px
      &:first-child
        order: -2
        margin-right: 12px
      &:last-child
        order: -1
        margin-left: 12px
  &__wrap
    min-width: calc(100% - 2*47px)
    overflow: hidden
    +media-sm(down)
      width: 100%
  &__track
    +grid-in()
    &:not(.js-dragged)
      transition: transform .3s ease
  &:hover
    overflow: visible
    z-index: 2

// Product set item
.products-carousel-2
  margin-top: 0!important
.product-set-item
  width: 177px
  margin: 0 12px
  text-align: center
  position: relative
  &__image
    width: 100%
    position: relative
    border: 1px solid #ebebeb
    //height: 180px
    display: block
    overflow: hidden
    & > img
      //+image-center()
      width: 100%
      display: block
  &__name
    max-width: 100%
    display: block
    min-height: 42px
    font-size: 12px
    line-height: 14px
    color: #272727
    margin-top: 5px
    text-decoration: none
  &__price
    height: 54px
    margin-top: 5px
    padding-bottom: 5px !important
    &.product__price
      & > span
        display: block
      .old-price
        position: static
        margin-left: 0
        margin-right: 0
        padding-right: 0
  &__buy
    span
      &:last-child
        display: none
    &.active
      span
        &:first-child
          display: none
        &:last-child
          display: inline-block
  &__description
    padding-bottom: 1px
    display: flex
    flex-direction: column
    align-items: center
    flex-grow: 1
    position: relative
  &__size
    width: 100%
    margin-left: 0
    position: absolute
    height: 50%
    padding-top: 24px
    bottom: -1px
    left: 0
    background-color: rgba(255, 255, 255, .75)
    transform: translateY(100%)
    transition: transform .3s ease .3s
    & > .size-filter__size
      background-color: #fff
      text-decoration: none
      color: #272727
      &.active
        background-color: #fcd82f
      &.missing
        color: gray
        &.active
          color: #fff
          background-color: silver
    & > .popup-notice_size
      margin-top: -2px
      top: -100%
      width: 100%
      left: 0
  &:focus, &:hover
    .product-set-item__size
      transition: transform .3s ease
      transform: translateY(0)


// Reviews and vk comments
.product-reviews-and-comments
  margin-top: 30px
  +col(24)
  +col-lg(18)
  .wrapper
    width: 100%
  &__tabs
    display: flex
    +align(start, center)
    border-bottom: 1px solid #ebebeb
  &__tab
    +media-sm(up)
      font-size: 20px
    +media-xs(down)
      font-size: 18px
    color: #000000
    padding: 20px 0
    margin-bottom: -1px
    border-bottom: 5px solid transparent
    cursor: pointer
    transition: border-color .3s ease
    & > span
      font-size: 18px
      color: #969696
    &:hover, &:focus, &.active
      border-color: #fcd82f
  &__separator
    width: 1px
    height: 36px
    background-color: #d1d1d1
    margin: 0 20px
  & > div
    &:nth-child(2), &:nth-child(3)
      display: none
    &.active
      &:nth-child(2), &:nth-child(3)
        display: flex
// Review
.product-review
  margin-top: 30px
  padding-bottom: 30px
  border-bottom: 1px solid #ebebeb
  display: flex
  flex-wrap: wrap
  +col(24)
  &__info
    +col(24)
    +offset-md(right, 1)
    +col-md(8)
    display: flex
    & > i
      margin-right: 20px
    & > div > .product-rating
      margin-top: 15px
      +media-sm(down)
        display: inline-block
    +media-sm(down)
      margin-bottom: 20px

  &__name
    font-size: 16px
    font-weight: 700
    color: #000000
  &__date
    margin-top: 10px
    font-size: 12px
    color: #a5a5a5
    +media-sm(down)
      display: inline-block
      margin-right: 10px
  &__text
    +col(24)
    +col-md(15)
    font-size: 14px
    color: #000000
    &_answer
      +offset-md(right, 9)
      background: #e8e8e8
      padding: 10px
      position: relative
      &:before
        content: ""
        display: block
        position: absolute
        left: 60px
        top: -15px
        width: 0
        height: 0
        border-style: solid
        border-width: 0 8px 15px
        border-color: transparent transparent #e8e8e8
  &__answer-title
    font-weight: 700
    margin-bottom: 5px


// Reviews navigation
.product-reviews-navigation
  margin-top: 30px
  width: 100%
  display: flex
  flex-wrap: wrap
  +media-md(down)
    +align(between)
  & > .btn_more
    +col(24)
    +col-md(9)
    +offset-md(left, 2)
    +col-xl(7)
    +offset-lg(left, 2)
  & > .btn_show-all
    +media-sm(down)
      margin-top: 30px
      +col(24)
  &.hidden
    display: none

// Review form
.product-review-form
  margin-top: 30px
  +col(24)
  +col-lg(6)
  &__title
    font-size: 20px
    color: #000000
    padding: 20px 0 23px
  &__body
    padding: 30px
    border: 1px solid #d1d1d1
    & > textarea
      height: 147px
    & > .rating-inputs
      margin-top: 20px
      display: flex
      +align(between)
      .label
        display: block
        text-align: center
        margin-top: 10px
        width: 22px
  &__label
    font-size: 13px
    color: #b5b5b5
    &_mt
      margin-top: 20px
.reviews
  width: 100%
// Reviews empty
.reviews-empty
  text-align: center
  border-bottom: 1px solid #EBEBEB
  padding: 100px 0 185px
  +col(24)
  &__title
    margin-top: 30px
    font-weight: 900
    font-size: 18px
    color: #000000
  &__text
    display: inline-block
    max-width: 510px
    margin-top: 30px
    font-size: 14px
    color: #000000
  & > .product-rating
    margin-top: 30px

// Form success
.form-success
  text-align: center
  padding: 90px 0 115px
  &__title
    margin-top: 30px
    font-size: 36px
    font-weight: 900
    color: #fcd82f
  &__text
    margin-top: 30px
    & > span
      color: #36b057
  &_modal
    padding: 30px 40px 70px
    & > .form-success__text
      max-width: 420px

// Full width carousel seen products
.products-carousel-block
  margin-top: 30px
  &__title
    text-align: center
    +media-md(up)
      font-size: 24px
    +media-sm(down)
      font-size: 18px
      margin-bottom: 10px
    color: #272727
