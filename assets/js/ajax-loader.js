jQuery(document).ready(function($) {

    var AjaxLoader = function (){
        var valueClass = 'axaj_field';
        this.data = [];

        this.setLoadedValues = function( ){
            var values = this.data;

            for( var key in values ){
                var curElem = document.querySelectorAll('.'+valueClass+'.'+key);
                curElem != undefined? curElem.forEach(function( item ){ item.innerText = values[key]; item.classList.remove(valueClass); } ) : false;
            }

            this.setCostsTab();
            this.setVisualReportTab();
            this.showDebts();
            this.hideTabsLoadingAnimation();
        };

        this.loadData = function(){
            var data = {
                    action: 'additional_info',
                    number: document.querySelector('#car_reg_num').getAttribute('data-car-num')
                },
                self = this;

            jQuery.post( '/wp-admin/admin-ajax.php', data, function(response) {
                self.data = JSON.parse(response);
                console.log(self.data);
                self.setLoadedValues();
            });
        }

        this.setCostsTab = function( ){
            var costTmpl = document.querySelector('.charges-info__content-exemple .charges-info__content-list'),
                costsWrap = document.querySelector('.charges-info__content'),
                elemClass = '.charges-info__content-item';

            if( this.data['car_costs'].length > 0 ){
                document.querySelector('.charges-info__header-list').classList.remove('hidden');

                this.data['car_costs'].forEach( function (item) {
                    var curCostTmpl = costTmpl.cloneNode(true)

                    curCostTmpl.querySelector( elemClass+'--date' ).innerText = item.RegNr;
                    curCostTmpl.querySelector( elemClass+'--result' ).innerText = item.AfgiftTypeFormateretKort;
                    curCostTmpl.querySelector( elemClass+'--km' ).innerText = item.DaekkerTil;
                    curCostTmpl.querySelector( elemClass+'--reg' ).innerText = item.Pris;

                    costsWrap.appendChild( curCostTmpl );
                } );
            }else{
                document.querySelector('.charges-info__not-found').classList.remove('hidden');
            }
        }

        this.setVisualReportTab = function( ){
            var itemTmpl = document.querySelector('.reports-info__wrap-example .reports-info__content'),
                itemsWrap = document.querySelector('.reports-info__wrap'),
                elemTopClass = '.reports-info__content-item',
                elemBottomClass = '.reports-info__hide';

            if(this.data['visual_report_list'].length > 0 ){
                document.querySelector('.reports-info__header-list').classList.remove('hidden');

                this.data['visual_report_list'].forEach( function (item) {
                    var curItemTmpl = itemTmpl.cloneNode(true);

                    curItemTmpl.querySelector( elemTopClass+'-date' ).innerText = item.Synsdato;
                    curItemTmpl.querySelector( elemTopClass+'-result' ).innerText = item.Synsresultat;
                    curItemTmpl.querySelector( elemTopClass+'-km' ).innerText = item.Kmstand;
                    curItemTmpl.querySelector( elemTopClass+'-regnum' ).innerText = item.RegNr;

                    curItemTmpl.querySelector( elemBottomClass+'-date' ).innerText = item.Synsdato;
                    curItemTmpl.querySelector( elemBottomClass+'-company' ).innerText = item.Firma;
                    curItemTmpl.querySelector( elemBottomClass+'-cvr' ).innerText = item.Cvr;
                    curItemTmpl.querySelector( elemBottomClass+'-adress' ).innerText = item.Adresse;
                    curItemTmpl.querySelector( elemBottomClass+'-type' ).innerText = item.Synstype;
                    curItemTmpl.querySelector( elemBottomClass+'-result' ).innerText = item.Synsresultat;
                    curItemTmpl.querySelector( elemBottomClass+'-km' ).innerText = item.Kmstand;

                    itemsWrap.appendChild( curItemTmpl );
                } );
            }else{
                document.querySelector('.reports-info__not-found').classList.remove('hidden');
            }
        }

        this.showDebts = function( ){
            var self = this;

            if( this.data['debts_isset'] === false ){
                document.querySelectorAll('.debts-info__not-found').forEach(function(item){ item.classList.remove('hidden') });
            }else{
                var itemsWrap = document.querySelectorAll('.debt-info__sub-list'),
                    itemTmpl = document.querySelector('.debt-info__sub-list-item');

                itemsWrap.forEach( function (listItems) {
                    self.data['debts_details'].forEach( function (item) {

                        var curItemTmpl = itemTmpl.cloneNode(true);
                        curItemTmpl.innerText = item;
                        listItems.appendChild( curItemTmpl );
                    });
                });

                document.querySelectorAll('.debt-info__list').forEach(function(item){ item.classList.remove('hidden') });
            }

            document.querySelectorAll('.debt-info__title .axaj_field').forEach(function(item){ item.remove() });
            document.querySelector('.overview-info__sub-title_debts .axaj_field').remove();
        }

        this.hideTabsLoadingAnimation = function( ){
            document.querySelectorAll('.reports-info__title .axaj_field, .charges-info__title .axaj_field').forEach(function(item){ item.remove() });
        }
    };

    if( document.querySelector('#car_reg_num') ){
        var Loader = new AjaxLoader();
        Loader.loadData();
    }
});
