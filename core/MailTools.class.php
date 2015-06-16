<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MailTools
 *
 * @author Mohsen
 */
class MailTools {
    protected $pdo;
    private $source;
    private $username;
    private $pass;
    private $host;
    private $mail;
    /**
     *
     * @var type 
     */
    private $name;
    function __construct($pdo) {
        $this->pdo = $pdo;
        $this->source = EMAILADDRESS;    
        $this->pass = EMAILPASS;
        $this->name = EMAILNAME;
        $this->host = EMAILHOST;
        $this->username = EMAILUSERNAME;
        $this->mail = new PHPMailer();
        $this->mail->IsSMTP();
        $this->mail->Host=$this->host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $this->username;
        $this->mail->Password = $this->pass;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->From = $this->source;
        $this->mail->FromName = $this->name;
        $this->mail->CharSet = "utf-8";
        $this->mail->WordWrap = 50;
        $this->mail->IsHTML(TRUE);
    }
    /**
     * Send Email to target address
     * @param string $targetMail  target address
     * @param string $subject  subject of email
     * @param string $body  Html body
     * @param string $bodyAlt Text version of Html
     * @return string
     */
    public function Send($targetMail, $subject, $body, $bodyAlt) {
        $this->mail->ClearAddresses();
        $this->mail->AddAddress($targetMail);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->AltBody = $bodyAlt;        
        $res = $this->mail->Send();
        if (!$res){
            return $this->mail->ErrorInfo;
        }else{
            return "";
        }
    }
    /**
     * Create Emial from template By Template Name
     * @param type $tmpName
     * @param type $data
     * @return null|\emailTemplate
     */
    public function CreateFromTemp($tmpName,$data){
        
        $sql="select * from tbltemplate where visibile=1 AND `positionName` LIKE '%$tmpName%' AND email=1";
        $temps = TbltemplateModel::findBySql($this->pdo, $sql);
        if (!is_array($temps) || count($temps)<=0){
            return NULL;
        }       
        $temp=$temps[0]; //find first ;)
        if ($temp->getVarcount() < count($data)) {
            return NULL;  // all data must send
        }
        $content = $temp->getBody();
        $altBody = $temp->getAltbody();
        for ($i = 0; $i < count($data); $i++) {
            $content = str_replace('\\' . $i . '/', $data[$i], $content);
            $altBody = str_replace('\\' . $i . '/', $data[$i], $altBody);
        }
        $tmp= new emailTemplate($content, $altBody, $temp->getSubject());
        return $tmp;        
    }
    /**
     * Create Email text from Template By Id
     * @param type $tmpId
     * @param type $data
     * @return null|\emailTemplate
     */
    public function CreateFromTempById($tmpId,$data){
                
        $temp = TbltemplateModel::findById($this->pdo, $tmpId);
        if ($temp==NULL){
           // echo "Error array";
            return NULL;
        }              
        if ($temp->getVarcount() < count($data)) {
           // echo "data recived must {$temp->getVarcount()} count";
            return NULL;  // all data must send
        }
        $content = $temp->getBody();
        $altBody = $temp->getAltbody();
        for ($i = 0; $i < count($data); $i++) {
            $content = str_replace('\\' . $i . '/', $data[$i], $content);
            $altBody = str_replace('\\' . $i . '/', $data[$i], $altBody);
        }
        $tmp= new emailTemplate($content, $altBody, $temp->getSubject());
        return $tmp;   
        
    }

}
