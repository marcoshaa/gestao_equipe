@extends('site.template')
@section('style')
<style>
    .divGroupFaq{
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        color:#fff;
        padding: 0px 40px;
    }
    .sessionFaq{
        font-size: 20px;
        font-weight: 600;
        margin-left: 15px;        
    }
    .linear-grad{        
        width: 100%;
        margin: 10px 0px;
        height: 2px;
    }
    .group_card{
        display:flex;
        flex-wrap: wrap;
        justify-content: space-around;
        width:100%;
    }
    .cards_faq{
        width: 100%;
        display:flex;
        flex-wrap: wrap;        
        flex-direction: column;
    }
    .cardTitle{
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor:pointer;
        border-bottom: 1px solid;
    }
    .tite_faq{
        font-weight: 600;
        font-size:20px;
        
    }
    .card_paragrafo.faqOpen{
        display: block !important;
        padding: 10px;
    }
    p.paragrafo_faq {
        width: 100%;
        margin-top: 5px;
        text-indent: 3ch;
    }
    .paragrafo_faq{
        width:100%;
        margin-top: 5px;
    }
    .vantagens_subtitle{
        margin: 3px 0px;
        font-weight: 600;
    }
    .card_paragrafo.faqOpen{
        display: block !important;
        padding: 10px;
    }
    #corpo_html{
        background: #272a2b;
        padding: 10px 0px;
        overflow: auto;
    }
    .card_paragrafo{
        display:flex;
        flex-wrap: wrap;
        display: none;
    }
</style>
@endsection

@section('content')
<div class="divGroupFaq">
    <p class="sessionFaq">FAQ</p>
    <div class="linear-grad"></div>
    <div class="group_card">
        <div class="cards_faq">
            <div class="cardTitle">
                <span class="tite_faq">Troca de Senha</span> <i class="bi bi-caret-down-fill"></i>
            </div>
            <div class="card_paragrafo">
                <p class="paragrafo_faq">
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                    doloremque in iste ipsa. Aut enim iure aut tempora earum quo voluptatem commodi.                                
                </p>
                <div class="vantagens_subtitle">Telefonia: Operadora de serviço telefônico.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Et aliquid provident eum temporibus quia a saepe quidem.
                    Eum voluptatem sint eum corporis nemo ut fuga repellendus.
                    Sed nemo rerum et architecto velit et odit tenetur hic quidem quasi 
                    ab porro Quis ut voluptatem maxime. Ut consectetur quae a velit fuga 
                    33 enim illum ea sequi ducimus. A fugiat Quis aut ratione dolorem ut neque quaerat. 
                    Ut quibusdam deleniti quo velit repellendus in iusto voluptatem id maxime velit est omnis
                    consectetur sit neque adipisci.
                    Et nemo dicta ex natus similique ut nesciunt mollitia et doloremque deserunt qui eius 
                    voluptates sit consequatur mollitia. Qui doloribus dolore sed similique neque ex quod rerum 
                    cum autem sunt et corrupti recusandae eum labore saepe.
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Sit dolores omnis ex enim optio est sunt quasi non quia 
                    nisi sit debitis numquam ut delectus repellat et perspiciatis voluptatem. Id autem consequatur 
                    sed veritatis enim hic molestiae libero est alias deserunt. A minus ratione nam libero vero ut 
                    ipsa omnis sit facere maiores eum reprehenderit autem. Eos cumque culpa in molestias dolore qui 
                    dolor rerum qui deserunt provident.
                    Ut voluptatem atque in totam dignissimos qui beatae accusantium id galisum corrupti cum molestiae 
                    nesciunt quo quia consequatur. Ut sint sint non officiis quibusdam et pariatur velit in illo nesciunt ut
                        dolores expedita aut repudiandae quibusdam ut galisum soluta.
                    Aut voluptatem nisi sed quisquam dolores et quas impedit. Et architecto consectetur qui dolorum quasi sed 
                    minima similique et quam perspiciatis At odit nemo ut asperiores veritatis non expedita laborum. Cum eveniet 
                    voluptas sed voluptas officiis et quas esse. Et adipisci earum ab adipisci ipsam eum nihil enim hic velit amet 
                    quo libero omnis aut harum galisum!
                </p>
                <div class="vantagens_subtitle">Discadora: Realiza ligações a partir de uma base de números e conecta à URA ou a um atendente.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>

                <div class="vantagens_subtitle">CRM: Permite que agentes do call center acessem informações de contatos rapidamente.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq"> 
                    Lorem ipsum dolor sit amet. Aut dolor maxime est porro consequatur est consequatur placeat. Vel 
                    voluptas amet et ullam tenetur et corrupti galisum et eaque blanditiis? Ea temporibus cumque sed 
                    amet cumque aut earum maxime et galisum tempore non quibusdam enim non sequi earum et deserunt deleniti.
                        Quo vero velit vel facere numquam eos nihil dicta quo officiis labore.
                    Est aspernatur saepe eum fugiat quae et magnam necessitatibus et incidunt maiores et dolor voluptatem.
                        Ut molestiae tempore aut quod molestiae ut quia saepe sit aliquam quibusdam. Sit quia quod nam sequi
                        voluptatibus non excepturi saepe eos sint deserunt 33 libero tempora et ipsa laboriosam. Et similique 
                        maiores ut exercitationem laudantium ea laborum nihil eum ullam magni est quidem reiciendis?
                    Aut quae distinctio id iste veniam qui consequuntur culpa aut exercitationem iste sed quaerat ipsum At 
                    expedita odit ut quod ipsam. Ut quam harum aut possimus iste a perferendis quisquam et omnis voluptas et delectus sapiente ut asperiores rerum.
                </p>
            </div>
        </div>
        <div class="cards_faq">
            <div class="cardTitle">
                <span class="tite_faq">Como Funciona o Quiz ?</span> <i class="bi bi-caret-down-fill"></i>
            </div>
            <div class="card_paragrafo">
                <p class="paragrafo_faq">
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                    doloremque in iste ipsa. Aut enim iure aut tempora earum quo voluptatem commodi.                                
                </p>
                <div class="vantagens_subtitle">Telefonia: Operadora de serviço telefônico.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Et aliquid provident eum temporibus quia a saepe quidem.
                    Eum voluptatem sint eum corporis nemo ut fuga repellendus.
                    Sed nemo rerum et architecto velit et odit tenetur hic quidem quasi 
                    ab porro Quis ut voluptatem maxime. Ut consectetur quae a velit fuga 
                    33 enim illum ea sequi ducimus. A fugiat Quis aut ratione dolorem ut neque quaerat. 
                    Ut quibusdam deleniti quo velit repellendus in iusto voluptatem id maxime velit est omnis
                    consectetur sit neque adipisci.
                    Et nemo dicta ex natus similique ut nesciunt mollitia et doloremque deserunt qui eius 
                    voluptates sit consequatur mollitia. Qui doloribus dolore sed similique neque ex quod rerum 
                    cum autem sunt et corrupti recusandae eum labore saepe.
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Sit dolores omnis ex enim optio est sunt quasi non quia 
                    nisi sit debitis numquam ut delectus repellat et perspiciatis voluptatem. Id autem consequatur 
                    sed veritatis enim hic molestiae libero est alias deserunt. A minus ratione nam libero vero ut 
                    ipsa omnis sit facere maiores eum reprehenderit autem. Eos cumque culpa in molestias dolore qui 
                    dolor rerum qui deserunt provident.
                    Ut voluptatem atque in totam dignissimos qui beatae accusantium id galisum corrupti cum molestiae 
                    nesciunt quo quia consequatur. Ut sint sint non officiis quibusdam et pariatur velit in illo nesciunt ut
                        dolores expedita aut repudiandae quibusdam ut galisum soluta.
                    Aut voluptatem nisi sed quisquam dolores et quas impedit. Et architecto consectetur qui dolorum quasi sed 
                    minima similique et quam perspiciatis At odit nemo ut asperiores veritatis non expedita laborum. Cum eveniet 
                    voluptas sed voluptas officiis et quas esse. Et adipisci earum ab adipisci ipsam eum nihil enim hic velit amet 
                    quo libero omnis aut harum galisum!
                </p>
                <div class="vantagens_subtitle">Discadora: Realiza ligações a partir de uma base de números e conecta à URA ou a um atendente.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>

                <div class="vantagens_subtitle">CRM: Permite que agentes do call center acessem informações de contatos rapidamente.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq"> 
                    Lorem ipsum dolor sit amet. Aut dolor maxime est porro consequatur est consequatur placeat. Vel 
                    voluptas amet et ullam tenetur et corrupti galisum et eaque blanditiis? Ea temporibus cumque sed 
                    amet cumque aut earum maxime et galisum tempore non quibusdam enim non sequi earum et deserunt deleniti.
                        Quo vero velit vel facere numquam eos nihil dicta quo officiis labore.
                    Est aspernatur saepe eum fugiat quae et magnam necessitatibus et incidunt maiores et dolor voluptatem.
                        Ut molestiae tempore aut quod molestiae ut quia saepe sit aliquam quibusdam. Sit quia quod nam sequi
                        voluptatibus non excepturi saepe eos sint deserunt 33 libero tempora et ipsa laboriosam. Et similique 
                        maiores ut exercitationem laudantium ea laborum nihil eum ullam magni est quidem reiciendis?
                    Aut quae distinctio id iste veniam qui consequuntur culpa aut exercitationem iste sed quaerat ipsum At 
                    expedita odit ut quod ipsam. Ut quam harum aut possimus iste a perferendis quisquam et omnis voluptas et delectus sapiente ut asperiores rerum.
                </p>
            </div>
        </div>
        <div class="cards_faq">
            <div class="cardTitle">
                <span class="tite_faq">Papel dos Administradores</span> <i class="bi bi-caret-down-fill"></i>
            </div>
            <div class="card_paragrafo">
                <p class="paragrafo_faq">
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                    doloremque in iste ipsa. Aut enim iure aut tempora earum quo voluptatem commodi.                                
                </p>
                <div class="vantagens_subtitle">Telefonia: Operadora de serviço telefônico.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Et aliquid provident eum temporibus quia a saepe quidem.
                    Eum voluptatem sint eum corporis nemo ut fuga repellendus.
                    Sed nemo rerum et architecto velit et odit tenetur hic quidem quasi 
                    ab porro Quis ut voluptatem maxime. Ut consectetur quae a velit fuga 
                    33 enim illum ea sequi ducimus. A fugiat Quis aut ratione dolorem ut neque quaerat. 
                    Ut quibusdam deleniti quo velit repellendus in iusto voluptatem id maxime velit est omnis
                    consectetur sit neque adipisci.
                    Et nemo dicta ex natus similique ut nesciunt mollitia et doloremque deserunt qui eius 
                    voluptates sit consequatur mollitia. Qui doloribus dolore sed similique neque ex quod rerum 
                    cum autem sunt et corrupti recusandae eum labore saepe.
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Sit dolores omnis ex enim optio est sunt quasi non quia 
                    nisi sit debitis numquam ut delectus repellat et perspiciatis voluptatem. Id autem consequatur 
                    sed veritatis enim hic molestiae libero est alias deserunt. A minus ratione nam libero vero ut 
                    ipsa omnis sit facere maiores eum reprehenderit autem. Eos cumque culpa in molestias dolore qui 
                    dolor rerum qui deserunt provident.
                    Ut voluptatem atque in totam dignissimos qui beatae accusantium id galisum corrupti cum molestiae 
                    nesciunt quo quia consequatur. Ut sint sint non officiis quibusdam et pariatur velit in illo nesciunt ut
                        dolores expedita aut repudiandae quibusdam ut galisum soluta.
                    Aut voluptatem nisi sed quisquam dolores et quas impedit. Et architecto consectetur qui dolorum quasi sed 
                    minima similique et quam perspiciatis At odit nemo ut asperiores veritatis non expedita laborum. Cum eveniet 
                    voluptas sed voluptas officiis et quas esse. Et adipisci earum ab adipisci ipsam eum nihil enim hic velit amet 
                    quo libero omnis aut harum galisum!
                </p>
                <div class="vantagens_subtitle">Discadora: Realiza ligações a partir de uma base de números e conecta à URA ou a um atendente.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>

                <div class="vantagens_subtitle">CRM: Permite que agentes do call center acessem informações de contatos rapidamente.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq"> 
                    Lorem ipsum dolor sit amet. Aut dolor maxime est porro consequatur est consequatur placeat. Vel 
                    voluptas amet et ullam tenetur et corrupti galisum et eaque blanditiis? Ea temporibus cumque sed 
                    amet cumque aut earum maxime et galisum tempore non quibusdam enim non sequi earum et deserunt deleniti.
                        Quo vero velit vel facere numquam eos nihil dicta quo officiis labore.
                    Est aspernatur saepe eum fugiat quae et magnam necessitatibus et incidunt maiores et dolor voluptatem.
                        Ut molestiae tempore aut quod molestiae ut quia saepe sit aliquam quibusdam. Sit quia quod nam sequi
                        voluptatibus non excepturi saepe eos sint deserunt 33 libero tempora et ipsa laboriosam. Et similique 
                        maiores ut exercitationem laudantium ea laborum nihil eum ullam magni est quidem reiciendis?
                    Aut quae distinctio id iste veniam qui consequuntur culpa aut exercitationem iste sed quaerat ipsum At 
                    expedita odit ut quod ipsam. Ut quam harum aut possimus iste a perferendis quisquam et omnis voluptas et delectus sapiente ut asperiores rerum.
                </p>
            </div>
        </div>
        <div class="cards_faq">
            <div class="cardTitle">
                <span class="tite_faq">Como Acessar o Material ?</span> <i class="bi bi-caret-down-fill"></i>
            </div>
            <div class="card_paragrafo">
                <p class="paragrafo_faq">
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                    doloremque in iste ipsa. Aut enim iure aut tempora earum quo voluptatem commodi.                                
                </p>
                <div class="vantagens_subtitle">Telefonia: Operadora de serviço telefônico.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Et aliquid provident eum temporibus quia a saepe quidem.
                    Eum voluptatem sint eum corporis nemo ut fuga repellendus.
                    Sed nemo rerum et architecto velit et odit tenetur hic quidem quasi 
                    ab porro Quis ut voluptatem maxime. Ut consectetur quae a velit fuga 
                    33 enim illum ea sequi ducimus. A fugiat Quis aut ratione dolorem ut neque quaerat. 
                    Ut quibusdam deleniti quo velit repellendus in iusto voluptatem id maxime velit est omnis
                    consectetur sit neque adipisci.
                    Et nemo dicta ex natus similique ut nesciunt mollitia et doloremque deserunt qui eius 
                    voluptates sit consequatur mollitia. Qui doloribus dolore sed similique neque ex quod rerum 
                    cum autem sunt et corrupti recusandae eum labore saepe.
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Sit dolores omnis ex enim optio est sunt quasi non quia 
                    nisi sit debitis numquam ut delectus repellat et perspiciatis voluptatem. Id autem consequatur 
                    sed veritatis enim hic molestiae libero est alias deserunt. A minus ratione nam libero vero ut 
                    ipsa omnis sit facere maiores eum reprehenderit autem. Eos cumque culpa in molestias dolore qui 
                    dolor rerum qui deserunt provident.
                    Ut voluptatem atque in totam dignissimos qui beatae accusantium id galisum corrupti cum molestiae 
                    nesciunt quo quia consequatur. Ut sint sint non officiis quibusdam et pariatur velit in illo nesciunt ut
                        dolores expedita aut repudiandae quibusdam ut galisum soluta.
                    Aut voluptatem nisi sed quisquam dolores et quas impedit. Et architecto consectetur qui dolorum quasi sed 
                    minima similique et quam perspiciatis At odit nemo ut asperiores veritatis non expedita laborum. Cum eveniet 
                    voluptas sed voluptas officiis et quas esse. Et adipisci earum ab adipisci ipsam eum nihil enim hic velit amet 
                    quo libero omnis aut harum galisum!
                </p>
                <div class="vantagens_subtitle">Discadora: Realiza ligações a partir de uma base de números e conecta à URA ou a um atendente.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>

                <div class="vantagens_subtitle">CRM: Permite que agentes do call center acessem informações de contatos rapidamente.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq"> 
                    Lorem ipsum dolor sit amet. Aut dolor maxime est porro consequatur est consequatur placeat. Vel 
                    voluptas amet et ullam tenetur et corrupti galisum et eaque blanditiis? Ea temporibus cumque sed 
                    amet cumque aut earum maxime et galisum tempore non quibusdam enim non sequi earum et deserunt deleniti.
                        Quo vero velit vel facere numquam eos nihil dicta quo officiis labore.
                    Est aspernatur saepe eum fugiat quae et magnam necessitatibus et incidunt maiores et dolor voluptatem.
                        Ut molestiae tempore aut quod molestiae ut quia saepe sit aliquam quibusdam. Sit quia quod nam sequi
                        voluptatibus non excepturi saepe eos sint deserunt 33 libero tempora et ipsa laboriosam. Et similique 
                        maiores ut exercitationem laudantium ea laborum nihil eum ullam magni est quidem reiciendis?
                    Aut quae distinctio id iste veniam qui consequuntur culpa aut exercitationem iste sed quaerat ipsum At 
                    expedita odit ut quod ipsam. Ut quam harum aut possimus iste a perferendis quisquam et omnis voluptas et delectus sapiente ut asperiores rerum.
                </p>
            </div>
        </div>
        <div class="cards_faq">
            <div class="cardTitle">
                <span class="tite_faq">Como Responder Ao Quiz ?</span> <i class="bi bi-caret-down-fill"></i>
            </div>
            <div class="card_paragrafo">
                <p class="paragrafo_faq">
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                    doloremque in iste ipsa. Aut enim iure aut tempora earum quo voluptatem commodi.                                
                </p>
                <div class="vantagens_subtitle">Telefonia: Operadora de serviço telefônico.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Et aliquid provident eum temporibus quia a saepe quidem.
                    Eum voluptatem sint eum corporis nemo ut fuga repellendus.
                    Sed nemo rerum et architecto velit et odit tenetur hic quidem quasi 
                    ab porro Quis ut voluptatem maxime. Ut consectetur quae a velit fuga 
                    33 enim illum ea sequi ducimus. A fugiat Quis aut ratione dolorem ut neque quaerat. 
                    Ut quibusdam deleniti quo velit repellendus in iusto voluptatem id maxime velit est omnis
                    consectetur sit neque adipisci.
                    Et nemo dicta ex natus similique ut nesciunt mollitia et doloremque deserunt qui eius 
                    voluptates sit consequatur mollitia. Qui doloribus dolore sed similique neque ex quod rerum 
                    cum autem sunt et corrupti recusandae eum labore saepe.
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Sit dolores omnis ex enim optio est sunt quasi non quia 
                    nisi sit debitis numquam ut delectus repellat et perspiciatis voluptatem. Id autem consequatur 
                    sed veritatis enim hic molestiae libero est alias deserunt. A minus ratione nam libero vero ut 
                    ipsa omnis sit facere maiores eum reprehenderit autem. Eos cumque culpa in molestias dolore qui 
                    dolor rerum qui deserunt provident.
                    Ut voluptatem atque in totam dignissimos qui beatae accusantium id galisum corrupti cum molestiae 
                    nesciunt quo quia consequatur. Ut sint sint non officiis quibusdam et pariatur velit in illo nesciunt ut
                        dolores expedita aut repudiandae quibusdam ut galisum soluta.
                    Aut voluptatem nisi sed quisquam dolores et quas impedit. Et architecto consectetur qui dolorum quasi sed 
                    minima similique et quam perspiciatis At odit nemo ut asperiores veritatis non expedita laborum. Cum eveniet 
                    voluptas sed voluptas officiis et quas esse. Et adipisci earum ab adipisci ipsam eum nihil enim hic velit amet 
                    quo libero omnis aut harum galisum!
                </p>
                <div class="vantagens_subtitle">Discadora: Realiza ligações a partir de uma base de números e conecta à URA ou a um atendente.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>

                <div class="vantagens_subtitle">CRM: Permite que agentes do call center acessem informações de contatos rapidamente.</div>
                <p class="paragrafo_faq">                                
                    Lorem ipsum dolor sit amet. Aut facilis quos ut suscipit omnis et dignissimos 
                    aliquam ut voluptatem vitae ut consequatur quidem et neque Quis ab nemo dolorem! Sed iusto 
                    iure At itaque explicabo id veniam quis sed ratione tempore sed expedita perferendis.
                    Ut fugiat molestias qui similique exercitationem rem nemo galisum. Sit iste rerum qui
                    quaerat alias aut odit odio. Qui excepturi molestias qui enim consequatur ea quisquam magnam 
                    eos repellendus possimus.
                    Et omnis assumenda hic sunt aspernatur qui porro dolores id voluptates eius est sint 
                </p>
                <div class="vantagens_subtitle">Vantagens:</div>
                <p class="paragrafo_faq"> 
                    Lorem ipsum dolor sit amet. Aut dolor maxime est porro consequatur est consequatur placeat. Vel 
                    voluptas amet et ullam tenetur et corrupti galisum et eaque blanditiis? Ea temporibus cumque sed 
                    amet cumque aut earum maxime et galisum tempore non quibusdam enim non sequi earum et deserunt deleniti.
                        Quo vero velit vel facere numquam eos nihil dicta quo officiis labore.
                    Est aspernatur saepe eum fugiat quae et magnam necessitatibus et incidunt maiores et dolor voluptatem.
                        Ut molestiae tempore aut quod molestiae ut quia saepe sit aliquam quibusdam. Sit quia quod nam sequi
                        voluptatibus non excepturi saepe eos sint deserunt 33 libero tempora et ipsa laboriosam. Et similique 
                        maiores ut exercitationem laudantium ea laborum nihil eum ullam magni est quidem reiciendis?
                    Aut quae distinctio id iste veniam qui consequuntur culpa aut exercitationem iste sed quaerat ipsum At 
                    expedita odit ut quod ipsam. Ut quam harum aut possimus iste a perferendis quisquam et omnis voluptas et delectus sapiente ut asperiores rerum.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    const faq = document.querySelectorAll(".cardTitle")

    faq.forEach(faqNew => {
        faqNew.addEventListener("click", () => {
            const resumo = faqNew.nextElementSibling
            resumo.classList.toggle("faqOpen")
        })
    });
</script>
@endsection