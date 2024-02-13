;(function() {

    const ids = {
        couponField : '[data-entity="basket-coupon-input"]'
    }

    const funcs = {

        makeForm: function(...args){
            const form = new FormData();
            args.forEach(arg => {
                form.append(arg.key, arg.value);
            });

            return form;
        },

        changeCoupon: function () {
            
            fetch('/local/ajax/coupon/cop.php', {
                method: 'POST',
                body: funcs.makeForm({'key': 'cop', "value": this.value}),

            }).then(response => response.json())
              .then(res => console.log(res))
              .catch(e => console.error(e));

        },

        Init: function() {
            document.addEventListener('DOMContentLoaded', function(){
                events.create(ids.couponField, 'change', funcs.changeCoupon);
            })
        }
    }

    const events = {
        create: function (id, evname, fname) {
            document.querySelector(id).
                addEventListener(`${evname}`, fname);
        }
    }

   funcs.Init();

})();