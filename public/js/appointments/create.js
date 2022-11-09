
    let $vet, $date, $specialty, iRadio;  
    let $hoursMorning,$hoursAfteroon,$titleMorning,$titleAfteroon;

    const titleMorning = `
        En la Mañana
    `;
    const titleAfteroon = `
        En la Tarde
    `;

    const noHours = `<h5 class="text-danger">
            No hay horas disponibles.
    </h5>`;


    $(function(){
        $specialty = $('#specialty');
        $vet = $('#veterinario');
        $date = $('#date');
        $titleMorning = $('#titleMorning');
        $hoursMorning = $('#hoursMorning');
        $titleAfteroon = $('#titleAfteroon');
        $hoursAfteroon = $('#hoursAfteroon');


        $specialty.change(() => {
            const specialtyId = $specialty.val();
            const url = `/especialidades/${specialtyId}/veterinarios`;
            $.getJSON(url,onVetsLoaded);

        
        });

        $vet.change(loadHours);
        $date.change(loadHours);
    });

    function onVetsLoaded(vets){
        console.log(vets);
        let htmlOptions = '';
        vets.forEach(vet =>{
            htmlOptions += `<option value="${vet.id}" >${vet.name}</option>`;

        });
        $vet.html(htmlOptions);

        loadHours();
        
    }

    function loadHours(){
    
    const selectedDate = $date.val();
    const VetId = $vet.val();
    const url = `/horario/horas?date=${selectedDate}&veterinario_id=${VetId}`;
    $.getJSON(url,displayHours);
    }
    function displayHours(data){
    let htmlHoursM = '';
    let htmlHoursA = '';

    iRadio = 0;

    if(data.morning){
        const morning_intervalos = data.morning;
        morning_intervalos.forEach(intervalo =>{
        
            htmlHoursM += getRadioIntervaloHTML(intervalo);

        });
    
    }
    if(!htmlHoursM != ""){
        htmlHoursM += noHours;
    }

    if(data.afteroon){
        const afteroon_intervalos = data.afteroon;
        afteroon_intervalos.forEach(intervalo =>{
        
            htmlHoursA += getRadioIntervaloHTML(intervalo);
            });
        }
        if(!htmlHoursA != ""){
            htmlHoursA += noHours;
        }
    

        $hoursMorning.html(htmlHoursM);
        $hoursAfteroon.html(htmlHoursA);
        $titleMorning.html(titleMorning);
        $titleAfteroon.html(titleAfteroon);



    }

    function getRadioIntervaloHTML(intervalo){
    const text = `${intervalo.start}-${intervalo.end}`;
    
    return `<div class="custom-control custom-radio mb-3">
            <input type="radio" id="interval${iRadio}" name="scheduled_time" value="${intervalo.start}" class="custom-control-input" required>
            <label class="custom-control-label" for="interval${iRadio++}">${text}</label>
            </div>`;
    }

