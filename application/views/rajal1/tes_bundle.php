<?php
        require_once 'vendor/autoload.php';

        use Ramsey\Uuid\Uuid;
        $myuuidencounter = Uuid::uuid4();
        $uuid_encounter = $myuuidencounter -> tostring();
        $myuuidcondition1 = Uuid::uuid4();
        $uuid_condition1 = $myuuidcondition1 -> tostring();
        $myuuidcondition2 = Uuid::uuid4();
        $uuid_condition2 = $myuuidcondition2 -> tostring();

        $param_bundle = '{
            "resourceType": "Bundle",
            "type": "transaction",
            "entry": [
                {
                    "fullUrl": "urn:uuid:'.$uuid_encounter.'",
                    "resource": {
                        "resourceType": "Encounter",
                        "status": "finished",
                        "class": {
                            "system": "http://terminology.hl7.org/CodeSystem/v3-ActCode",
                            "code": "AMB",
                            "display": "ambulatory"
                        },
                        "subject": {
                            "reference": "Patient/P00912894463",
                            "display": "Budi Santoso"
                        },
                        "participant": [
                            {
                                "type": [
                                    {
                                        "coding": [
                                            {
                                                "system": "http://terminology.hl7.org/CodeSystem/v3-ParticipationType",
                                                "code": "ATND",
                                                "display": "attender"
                                            }
                                        ]
                                    }
                                ],
                                "individual": {
                                    "reference": "Practitioner/10018180913",
                                    "display": "Dokter Bronsig"
                                }
                            }
                        ],
                        "period": {
                            "start": "2022-12-27T14:00:00+00:00",
                            "end": "2022-12-27T16:00:00+00:00"
                        },
                        "location": [
                            {
                                "location": {
                                    "reference": "Location/b017aa54-f1df-4ec2-9d84-8823815d7228",
                                    "display": "Ruang 1A, Poliklinik Bedah Rawat Jalan Terpadu, Lantai 2, Gedung G"
                                }
                            }
                        ],
                        "diagnosis": [
                            {
                                "condition": {
                                    "reference": "urn:uuid:'.$uuid_condition1.'",
                                    "display": "Acute appendicitis, other and unspecified"
                                },
                                "use": {
                                    "coding": [
                                        {
                                            "system": "http://terminology.hl7.org/CodeSystem/diagnosis-role",
                                            "code": "DD",
                                            "display": "Discharge diagnosis"
                                        }
                                    ]
                                },
                                "rank": 1
                            },
                            {
                                "condition": {
                                    "reference": "urn:uuid:'.$uuid_condition2.'",
                                    "display": "Dengue haemorrhagic fever"
                                },
                                "use": {
                                    "coding": [
                                        {
                                            "system": "http://terminology.hl7.org/CodeSystem/diagnosis-role",
                                            "code": "DD",
                                            "display": "Discharge diagnosis"
                                        }
                                    ]
                                },
                                "rank": 2
                            }
                        ],
                        "statusHistory": [
                            {
                                "status": "arrived",
                                "period": {
                                    "start": "2022-12-27T14:00:00+00:00",
                                    "end": "2022-12-27T15:00:00+00:00"
                                }
                            },
                            {
                                "status": "in-progress",
                                "period": {
                                    "start": "2022-12-27T15:00:00+00:00",
                                    "end": "2022-12-27T16:00:00+00:00"
                                }
                            },
                            {
                                "status": "finished",
                                "period": {
                                    "start": "2022-12-27T16:00:00+00:00",
                                    "end": "2022-12-27T16:00:00+00:00"
                                }
                            }
                        ],
                        "serviceProvider": {
                            "reference": "Organization/fed8b99b-896d-41b1-bbe1-43e58fc5c3e9"
                        },
                        "identifier": [
                            {
                                "system": "http://sys-ids.kemkes.go.id/encounter/fed8b99b-896d-41b1-bbe1-43e58fc5c3e9",
                                "value": "21323"
                            }
                        ]
                    },
                    "request": {
                        "method": "POST",
                        "url": "Encounter"
                    }
                },
                {
                    "fullUrl": "urn:uuid:'.$uuid_condition1.'",
                    "resource": {
                        "resourceType": "Condition",
                        "clinicalStatus": {
                            "coding": [
                                {
                                    "system": "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                    "code": "active",
                                    "display": "Active"
                                }
                            ]
                        },
                        "category": [
                            {
                                "coding": [
                                    {
                                        "system": "http://terminology.hl7.org/CodeSystem/condition-category",
                                        "code": "encounter-diagnosis",
                                        "display": "Encounter Diagnosis"
                                    }
                                ]
                            }
                        ],
                        "code": {
                            "coding": [
                                {
                                    "system": "http://hl7.org/fhir/sid/icd-10",
                                    "code": "K35.8",
                                    "display": "Acute appendicitis, other and unspecified"
                                }
                            ]
                        },
                        "subject": {
                            "reference": "Patient/P00912894463",
                            "display": "Budi Santoso"
                        },
                        "encounter": {
                            "reference": "urn:uuid:'.$uuid_encounter.'",
                            "display": "Kunjungan Budi Santoso di hari Selasa, 18 Desember 2022"
                        }
                    },
                    "request": {
                        "method": "POST",
                        "url": "Condition"
                    }
                },
                {
                    "fullUrl": "urn:uuid:'.$uuid_condition2.'",
                    "resource": {
                        "resourceType": "Condition",
                        "clinicalStatus": {
                            "coding": [
                                {
                                    "system": "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                    "code": "active",
                                    "display": "Active"
                                }
                            ]
                        },
                        "category": [
                            {
                                "coding": [
                                    {
                                        "system": "http://terminology.hl7.org/CodeSystem/condition-category",
                                        "code": "encounter-diagnosis",
                                        "display": "Encounter Diagnosis"
                                    }
                                ]
                            }
                        ],
                        "code": {
                            "coding": [
                                {
                                    "system": "http://hl7.org/fhir/sid/icd-10",
                                    "code": "A91",
                                    "display": "Dengue haemorrhagic fever"
                                }
                            ]
                        },
                        "subject": {
                            "reference": "Patient/P00912894463",
                            "display": "Budi Santoso"
                        },
                        "encounter": {
                            "reference": "urn:uuid:'.$uuid_encounter.'",
                            "display": "Kunjungan Budi Santoso di hari Selasa, 18 Desember 2022"
                        }
                    },
                    "request": {
                        "method": "POST",
                        "url": "Condition"
                    }
                }
            ]
        }';
        $url = 'tes';
        var_dump($param_bundle);
        echo '<br>';
        // dd($param_bundle);
        // $send_dev = $this->kirim_postdev($param_bundle,$url);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-satusehat-dev.dto.kemkes.go.id/fhir-r4/v1',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $param_bundle,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer F5pPYxbxK76omM4xlEVnlmAfLGCc'
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        var_dump($response);

        // dd($send_dev);
    