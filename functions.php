<?php

require_once 'vendor/autoload.php';

use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;

class SongGenerator {

  private $model;

  public function __construct() {
    // Carica i dati di addestramento
    $data = $this->loadTrainingData();

    // Crea un modello di classificazione SVM
    $this->model = new SVC(Kernel::RBF, $cost = 1000);

    // Addestra il modello con i dati di addestramento
    $this->model->train($data['samples'], $data['labels']);
  }

public function generateSong($mood, $style, $instrument) {
    // Usa il modello di classificazione per determinare la categoria della canzone
    $category = $this->model->predict([$mood, $style, $instrument]);

    // Verifica se la categoria predetta è valida, altrimenti scegli casualmente tra le tre categorie
    if ($category >= 0 && $category <= 2) {
        // Genera il testo della canzone in base alla categoria
        switch($category) {
            case 0:
                $lyrics = $this->generateUpbeatSong();
                break;
            case 1:
                $lyrics = $this->generateSadSong();
                break;
            case 2:
                $lyrics = $this->generateLoveSong();
                break;
        }
    } 

    return $lyrics;
}



private function generateUpbeatSong() {
    // Genera il testo di una canzone allegra
    $lyrics = "Voglio ballare con te fino all'alba\n";
    $lyrics .= "Niente può fermare la nostra festa\n";
    $lyrics .= "Il mondo è nostro e noi siamo liberi\n";
    $lyrics .= "Non smetteremo mai di ballare insieme\n";
    $lyrics .= "La notte è giovane, la musica ci chiama\n";
    $lyrics .= "Balliamo insieme fino all'alba\n";
    $lyrics .= "Il ritmo ci prende e non ci lascia andare\n";
    $lyrics .= "Non c'è posto migliore di questo per essere felici\n";
    $lyrics .= "La pista è il nostro mondo, noi siamo i re\n";
    $lyrics .= "Le luci brillano, la gente ride e si diverte\n";
    $lyrics .= "Non c'è niente da temere, solo la voglia di ballare\n";
    $lyrics .= "Insieme siamo forti, insieme siamo liberi\n";
    $lyrics .= "Niente può fermarci, la festa continua\n";
    $lyrics .= "Balliamo, cantiamo, ridiamo, amiamo la vita\n";
    return $lyrics;
}

private function generateSadSong() {
    // Genera il testo di una canzone triste
    $lyrics = "Mi manchi troppo e non so come fare\n";
    $lyrics .= "La mia vita senza di te non ha senso\n";
    $lyrics .= "Pensare a te mi fa male\n";
    $lyrics .= "Vorrei poter riavere te accanto a me\n";
    $lyrics .= "Ma adesso sei lontano, e io sono solo\n";
    $lyrics .= "Il mio cuore è spezzato in mille pezzi\n";
    $lyrics .= "Non so come fare per dimenticare\n";
    $lyrics .= "Le tue carezze, i tuoi baci, le tue risate\n";
    $lyrics .= "Vorrei solo poterti abbracciare ancora una volta\n";
    $lyrics .= "E sentire il tuo calore accanto a me\n";
    $lyrics .= "Ma so che è solo un sogno, e la realtà è diversa\n";
    $lyrics .= "Tu sei lontano, e io sono solo\n";
    $lyrics .= "Ma non smetterò mai di pensare a te\n";
    $lyrics .= "Perché tu sei la mia vita, il mio amore\n";
    $lyrics .= "E anche se sei lontano, sarai sempre nel mio cuore\n";
    return $lyrics;
}


/*private function generateLoveSong() {
    // Genera il testo di una canzone d'amore
    $lyrics = "Tu sei la mia vita, il mio tesoro\n";
    $lyrics .= "Non posso vivere senza il tuo amore\n";
    $lyrics .= "Tu mi completi, mi fai sentire vivo\n";
    $lyrics .= "Sarò sempre tuo, fino alla fine dei miei giorni\n";
    return $lyrics;
}*/

private function generateLoveSong() {
  // Genera il testo di una canzone d'amore
  $lyrics = "Tu sei la mia vita, il mio tesoro\n";
  $lyrics .= "Non posso vivere senza il tuo amore\n";
  $lyrics .= "Tu mi completi, mi fai sentire vivo\n";
  $lyrics .= "Sarò sempre tuo, fino alla fine dei miei giorni\n";

  $randomPhrases = [
    "In ogni gesto tuo vedo l'amore",
    "Con te al mio fianco, il mondo è perfetto",
    "La tua voce è la melodia della mia vita",
    "Ogni istante con te è un dono prezioso",
    "La tua bellezza mi lascia senza fiato"
  ];

  $randomStrophe = "";
  for ($i = 0; $i < 3; $i++) {
    $randomStrophe .= $lyrics;
    $randomStrophe .= "\n";
    for ($j = 0; $j < 4; $j++) {
      $randomStrophe .= $randomPhrases[array_rand($randomPhrases)] . "\n";
    }
    $randomStrophe .= "\n";
  }

  return $randomStrophe;
}


  private function loadTrainingData() {
    // Carica i dati di addestramento dal file CSV
    $data = [];
    $samples = [];
    $labels = [];

    if (($handle = fopen("training_data.csv", "r")) !== FALSE) {
      while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $samples[] = [$row[0], $row[1], $row[2]];
        $labels[] = $row[3];
      }
      fclose($handle);
    }

    $data['samples'] = $samples;
    $data['labels'] = $labels;

    return $data;
  }
}
