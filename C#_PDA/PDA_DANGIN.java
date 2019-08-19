using System;
using System.Linq;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using System.Net;
using System.IO;


namespace Dhsteel_Project
{
    public partial class FormStock : Form
    {


        private Form formMenu;
        private Dictionary<string, string> yardcust = new Dictionary<string, string>();
        

        UserKeypadUpper keypad;

        public FormStock(Form fm)
        {
            InitializeComponent();

            formMenu = fm;

            if (FormLogin.loginbean.db_status == 1)
            {
                l_title.Text = "대한철강(주) - 재고조사";
            }
            else
            {
                l_title.Text = "오케이스틸(주) - 재고조사";
            }

            getSysDate();

            // 하치장 가져오기
            Uri url = new Uri(FormLogin.loginbean.url_format + "stock_YardList.jsp");
            yardcust.Add("", "");

            if (url.Scheme == Uri.UriSchemeHttp)
            {
                HttpWebRequest req = null;
                try
                {
                    req = (HttpWebRequest)WebRequest.Create(url);
                }
                catch (UriFormatException urlE)
                {
                    MessageBox.Show(urlE.Message);
                    return;
                }

                HttpWebResponse response = null;
                try
                {
                    response = (HttpWebResponse)req.GetResponse();
                    StreamReader readStream = new StreamReader(response.GetResponseStream(), Encoding.UTF8, true);
                    string reader = readStream.ReadToEnd().Trim();

                    readStream.Close();
                    response.Close();

                    //MessageBox.Show(reader);
                    if (reader.Length > 0)
                    {
                        reader = reader.Substring(0, reader.Length - 1);
                    }

                    string[] dataObject = reader.Split('|');
                    for (int i = 0; i < dataObject.Length; i++)
                    {
                        //MessageBox.Show(i.ToString() + " : " + dataObject[i]);
                        string[] dataDetail = dataObject[i].Split('^');
                        yardcust.Add(dataDetail[0], dataDetail[1]);

                    }
                }
                catch (WebException we)
                {
                    MessageBox.Show(we.Message);
                    return;
                }
            }
            yard.DataSource = new BindingSource(yardcust, null);
            yard.DisplayMember = "Value";
            yard.ValueMember = "Key";

            yard.SelectedValue = FormLogin.loginbean.yard_cust_cd;
                        
          
        
        }

        private void FormStock_Closed(object sender, EventArgs e)
        {
            formMenu.Show();
        }

        private void p_close_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void getSysDate()
        {
            Uri url = new Uri(FormLogin.loginbean.url_format + "stock_getSysDate.jsp");
            string param = "db_status=" + FormLogin.loginbean.db_status.ToString();
            Encoding encoding = Encoding.UTF8;
            byte[] bp = encoding.GetBytes(param);

            if (url.Scheme == Uri.UriSchemeHttp)
            {
                HttpWebRequest req = null;
                try
                {
                    req = (HttpWebRequest)WebRequest.Create(url);
                    req.Method = "POST";
                    req.ContentType = "application/x-www-form-urlencoded";
                    req.ContentLength = bp.Length;
                    Stream stream = req.GetRequestStream();
                    stream.Write(bp, 0, bp.Length);
                    stream.Close();
                }
                catch (UriFormatException urlE)
                {
                    MessageBox.Show(urlE.Message);
                    return;
                }

                HttpWebResponse response = null;
                try
                {
                    response = (HttpWebResponse)req.GetResponse();
                    StreamReader readStream = new StreamReader(response.GetResponseStream(), Encoding.UTF8, true);
                    string reader = readStream.ReadToEnd().Trim();

                    readStream.Close();
                    response.Close();

                    if (reader.Length >= 8)
                    {
                        dt_date.Value = Convert.ToDateTime(reader);
                    }
                }
                catch (WebException we)
                {
                    MessageBox.Show(we.Message);
                    return;
                }
            }
        }

        private void p_menu_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void p_clear_Click(object sender, EventArgs e)
        {
            t_pos_cd.Text = null;
            t_label_no.Text = null;

            lv_stock_list.Items.Clear();

            getSysDate();
        }

        private void p_keypad_Click(object sender, EventArgs e)
        {
            keypad = new UserKeypadUpper();
            keypad.UserSendEvent += new UserKeypadUpper.UserSendDataHandler(KeypadLabelnoEventMethod);
            this.Controls.Add(keypad);
            keypad.BringToFront();
            keypad.l_title.Text = "라벨번호 입력";
            keypad.Enabled = true;
        }

        private void KeypadLabelnoEventMethod(object sender)
        {
            string label_no = sender.ToString();

            keypad.Dispose();

            if (!label_no.Equals(""))
            {
                t_label_no.Text = label_no;
                submitData();
            }
        }

        private void t_label_no_TextChanged(object sender, EventArgs e)
        {
            t_label_no.Text = t_label_no.Text.ToUpper();
            t_label_no.Select(t_label_no.Text.Length, 0);
        }

        private void p_keypad_pos_Click(object sender, EventArgs e)
        {
            keypad = new UserKeypadUpper();
            keypad.UserSendEvent += new UserKeypadUpper.UserSendDataHandler(KeypadPosCdEventMethod);
            this.Controls.Add(keypad);
            keypad.BringToFront();
            keypad.l_title.Text = "적재위치 입력";
            keypad.Enabled = true;
        }

        private void KeypadPosCdEventMethod(object sender)
        {
            string pos_cd = sender.ToString();

            keypad.Dispose();

            if (!pos_cd.Equals(""))
            {
                t_pos_cd.Text = pos_cd;
                t_label_no.Focus();
            }
        }

        private void t_pos_cd_TextChanged(object sender, EventArgs e)
        {
            t_pos_cd.Text = t_pos_cd.Text.ToUpper();
            t_pos_cd.Select(t_pos_cd.Text.Length, 0);
        }

        private void t_label_no_KeyPress(object sender, KeyPressEventArgs e)
        {
            if (e.KeyChar == (char)Keys.Enter)
            {
                submitData();
            }
        }

                private void submitData()
        {
            if (dt_date.Text == null || dt_date.Text == "")
            {
                MessageBox.Show("조사일자를 입력하세요.");
                dt_date.Focus();
                return;
            }

            if (t_label_no.Text == null || t_label_no.Text == "")
            {
                MessageBox.Show("Label no.를 입력하세요.");
                t_label_no.Focus();
                return;
            }

            string stockInfo = dt_date.Text + ",";
            stockInfo += t_pos_cd.Text + ",";
            stockInfo += t_label_no.Text + ",";
            stockInfo += FormLogin.loginbean.user_id + ",";
            stockInfo += FormLogin.loginbean.workplace_cd + ",";
            stockInfo += FormLogin.loginbean.db_status.ToString() + ",";
            stockInfo += FormLogin.loginbean.now_work_cust_cd + ",";
            stockInfo += yard.SelectedValue; 

            Uri url = new Uri(FormLogin.loginbean.url_format + "stock_submitData.jsp");
            string param = "stockInfo=" + stockInfo;
            Encoding encoding = Encoding.UTF8;
            byte[] bp = encoding.GetBytes(param);

            if (url.Scheme == Uri.UriSchemeHttp)
            {
                HttpWebRequest req = null;
                try
                {
                    req = (HttpWebRequest)WebRequest.Create(url);
                    req.Method = "POST";
                    req.ContentType = "application/x-www-form-urlencoded";
                    req.ContentLength = bp.Length;
                    Stream stream = req.GetRequestStream();
                    stream.Write(bp, 0, bp.Length);
                    stream.Close();
                }
                catch (UriFormatException urlE)
                {
                    MessageBox.Show(urlE.Message);
                    return;
                }

                HttpWebResponse response = null;
                try
                {
                    response = (HttpWebResponse)req.GetResponse();
                    StreamReader readStream = new StreamReader(response.GetResponseStream(), Encoding.UTF8, true);
                    string reader = readStream.ReadToEnd().Trim();

                    readStream.Close();
                    response.Close();

                    //MessageBox.Show(reader);
                                  
                                                            
                    
                    if (reader.Length < 3)
                    {
                        switch (reader)
                        {
                            case "UE":
                                MessageBox.Show("Update 처리 중 에러가 발생했습니다.");
                                break;

                            case "IE":
                                MessageBox.Show("Insert 처리 중 에러가 발생했습니다.");
                                break;

                            case "DE":
                                MessageBox.Show("중복된 데이터가 존재합니다.");
                                break;
                        }


                        t_label_no.Select(0, t_label_no.Text.Length + 1);
                        t_label_no.Focus();
                    }
                    else
                    {
                        string[] dataObject = reader.Split(',');
                        if (dataObject.Length > 0)
                        {
                            string[] listView = new string[8];

                            if (dataObject[0].Equals("US"))
                            {
                                listView[0] = "√";
                            }
                            else
                            {
                                listView[0] = "New";
                            }

                                                      
                            listView[1] = dataObject[1].Replace("null", ""); // pack_no
                            listView[2] = dataObject[2].Replace("null", ""); // pack_no
                            listView[3] = dataObject[3].Replace("null", ""); // 품명
                            listView[4] = dataObject[4].Replace("null", ""); // 재질
                            listView[5] = dataObject[5].Replace("null", ""); // size
                            listView[6] = System.String.Format("{0:#,##0}", System.Convert.ToSingle(dataObject[6])); // 수량
                            listView[7] = System.String.Format("{0:#,##0.0}", System.Convert.ToSingle(dataObject[7])); // 중량

                            var listViewItem = new ListViewItem(listView);
                            lv_stock_list.Items.Insert(0, listViewItem);

                            t_label_no.Text = null;
                            t_label_no.Focus();
                        }
                    }
                }
                catch (WebException we)
                {
                    MessageBox.Show(we.Message);
                    return;
                }
            }
        }

        private void t_pos_cd_KeyPress(object sender, KeyPressEventArgs e)
        {
            if (e.KeyChar == (char)Keys.Enter)
            {
                t_label_no.Focus();
            }


        }

    }
}
    





















using System;
using System.Linq;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using System.Net;
using System.IO;

namespace Dhsteel_Project
{
    public partial class FormStockPos : Form
    {
        private Form formMenu;
        private Dictionary<string, string> yardcust = new Dictionary<string, string>();
        private string label_no;

        UserKeypadUpper keypad;

        public FormStockPos(Form fm)
        {
            InitializeComponent();

            formMenu = fm;

            if (FormLogin.loginbean.db_status == 1)
            {
                l_title.Text = "대한철강(주) - 재고조사(당진)";
            }
            else
            {
                l_title.Text = "오케이스틸(주) - 재고조사(당진)";
            }

            getSysDate();

            // 하치장 가져오기
            Uri url = new Uri(FormLogin.loginbean.url_format + "stock_YardList.jsp");
            yardcust.Add("", "");

            if (url.Scheme == Uri.UriSchemeHttp)
            {
                HttpWebRequest req = null;
                try
                {
                    req = (HttpWebRequest)WebRequest.Create(url);
                }
                catch (UriFormatException urlE)
                {
                    MessageBox.Show(urlE.Message);
                    return;
                }

                HttpWebResponse response = null;
                try
                {
                    response = (HttpWebResponse)req.GetResponse();
                    StreamReader readStream = new StreamReader(response.GetResponseStream(), Encoding.UTF8, true);
                    string reader = readStream.ReadToEnd().Trim();

                    readStream.Close();
                    response.Close();

                    //MessageBox.Show(reader);
                    if (reader.Length > 0)
                    {
                        reader = reader.Substring(0, reader.Length - 1);
                    }

                    string[] dataObject = reader.Split('|');
                    for (int i = 0; i < dataObject.Length; i++)
                    {
                        //MessageBox.Show(i.ToString() + " : " + dataObject[i]);
                        string[] dataDetail = dataObject[i].Split('^');
                        yardcust.Add(dataDetail[0], dataDetail[1]);
                    }
                }
                catch (WebException we)
                {
                    MessageBox.Show(we.Message);
                    return;
                }
            }
            yard.DataSource = new BindingSource(yardcust, null);
            yard.DisplayMember = "Value";
            yard.ValueMember = "Key";

            yard.SelectedValue = FormLogin.loginbean.yard_cust_cd;
                   
                        
        }


        private void p_close_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void FormChangePos_Closed(object sender, EventArgs e)
        {
            formMenu.Show();
        }

        private void p_keypad_Click(object sender, EventArgs e)
        {
            keypad = new UserKeypadUpper();
            keypad.UserSendEvent += new UserKeypadUpper.UserSendDataHandler(KeypadLabelnoEventMethod);
            this.Controls.Add(keypad);
            keypad.BringToFront();
            keypad.l_title.Text = "라벨번호 입력";
            keypad.Enabled = true;
        }

        private void KeypadLabelnoEventMethod(object sender)
        {
            string label = sender.ToString();

            keypad.Dispose();

            if (!label.Equals(""))
            {
                t_label_no.Text = label;
                getCoilInfo();
                submitData();
            }
        }

        private void t_label_no_KeyPress(object sender, KeyPressEventArgs e)
        {
            if (e.KeyChar == (char)Keys.Enter)
            {
                getCoilInfo();
                submitData();
            }
        }

        private void t_label_no_TextChanged(object sender, EventArgs e)
        {
            t_label_no.Text = t_label_no.Text.ToUpper();
            t_label_no.Select(t_label_no.Text.Length, 0);
        }
                

        private void getCoilInfo()
        {
            if (t_label_no.Text == null || t_label_no.Text == "")
            {
                MessageBox.Show("라벨번호를 입력해주세요.");
                t_label_no.Focus();
                return;
            }

            Uri url = new Uri(FormLogin.loginbean.url_format + "stock_getStockData.jsp");
            string stockInfo = "stock_info=" + dt_date.Text + ",";
            stockInfo += t_label_no.Text + ",";
            stockInfo += FormLogin.loginbean.user_id + ",";
            stockInfo += FormLogin.loginbean.workplace_cd + ",";
            stockInfo += FormLogin.loginbean.db_status.ToString() + ",";
            stockInfo += FormLogin.loginbean.now_work_cust_cd + ",";
            stockInfo += yard.SelectedValue;

            Encoding encoding = Encoding.UTF8;
            byte[] bp = encoding.GetBytes(stockInfo);

            if (url.Scheme == Uri.UriSchemeHttp)
            {
                HttpWebRequest req = null;
                try
                {
                    req = (HttpWebRequest)WebRequest.Create(url);
                    req.Method = "POST";
                    req.ContentType = "application/x-www-form-urlencoded";
                    req.ContentLength = bp.Length;
                    Stream stream = req.GetRequestStream();
                    stream.Write(bp, 0, bp.Length);
                    stream.Close();
                }
                catch (UriFormatException urlE)
                {
                    MessageBox.Show(urlE.Message);
                    return;
                }

                HttpWebResponse response = null;
                try
                {
                    response = (HttpWebResponse)req.GetResponse();
                    StreamReader readStream = new StreamReader(response.GetResponseStream(), Encoding.UTF8, true);
                    string reader = readStream.ReadToEnd().Trim();

                    readStream.Close();
                    response.Close();

                    //MessageBox.Show(reader);

                    if (reader.Length < 3)
                    {
                        if (reader.Equals("DE"))



                        {
                            MessageBox.Show("중복된 데이터가 존재합니다.");

                            t_pack_no.Text = null;
                            t_coil_no.Text = null;
                            t_name_nm.Text = null;
                            t_stan_nm.Text = null;
                            t_size_no.Text = null;
                            t_quantity.Text = null;
                            t_weight.Text = null;
                            t_pos_cd_pre.Text = null;
                            t_pos_cd.Text = null;
                            label_no = null;
                        }
                        else if (reader.Equals("IE"))
                        {
                            MessageBox.Show("데이터 처리 중 오류가 발생했습니다.");
                        }

                        t_label_no.Select(0, t_label_no.Text.Length + 1);
                        return;
                    }
                    else
                    {
                        string[] dataObject = reader.Split(',');
                        if (dataObject.Length > 0)
                        {
                            label_no = dataObject[0].Replace("null", "");
                            t_pack_no.Text = dataObject[1].Replace("null", "");
                            t_coil_no.Text = dataObject[2].Replace("null", "");
                            t_name_nm.Text = dataObject[3].Replace("null", "");
                            t_stan_nm.Text = dataObject[4].Replace("null", "");
                            t_size_no.Text = dataObject[5].Replace("null", "");
                            t_quantity.Text = System.String.Format("{0:#,##0}", System.Convert.ToSingle(dataObject[6]));
                            t_weight.Text = System.String.Format("{0:#,##0.0}", System.Convert.ToSingle(dataObject[7]));
                            t_pos_cd_pre.Text = dataObject[8].Replace("null", "");
                                                                     
                            
                                                                        
                        }
                    }
                }
                catch (WebException we)
                {
                    MessageBox.Show(we.Message);
                    return;
                }
            }
         }

        
        
        private void t_pos_cd_TextChanged(object sender, EventArgs e)
        {
                                   
            t_pos_cd.Text = t_pos_cd.Text.ToUpper();
            t_pos_cd.Select(t_pos_cd.Text.Length, 0);
           
       
        }




        private void t_pos_cd_GotFocus(object sender, EventArgs e)
        {
            keypad = new UserKeypadUpper();
            keypad.UserSendEvent += new UserKeypadUpper.UserSendDataHandler(KeypadPosCdEventMethod);
            this.Controls.Add(keypad);
            keypad.BringToFront();
            keypad.l_title.Text = "적재위치 입력";
            keypad.Enabled = true;

            t_label_no.Focus();
        }




        private void KeypadPosCdEventMethod(object sender)
        {
            string pos_cd = sender.ToString();
           
            keypad.Dispose();

            if (!pos_cd.Equals(""))
            {
                t_pos_cd.Text = pos_cd;
                updatePosCd();
               
            }
        }

        private void t_pos_cd_KeyPress(object sender, KeyPressEventArgs e)
        {

            if (e.KeyChar == (char)Keys.Enter)
            {
                updatePosCd();
                
            }
        }

       
        private void updatePosCd()
        {
            string pos_cd = t_pos_cd.Text;

            if (label_no == null)
            {
                MessageBox.Show("제품정보가 조회되지 않았습니다.");
                t_label_no.Focus();
                return;
            }

            if (pos_cd.Equals("") || pos_cd == null)
            {
                MessageBox.Show("적재위치를 입력하세요.");
                t_pos_cd.Focus();
                return;
            }

            Uri url = new Uri(FormLogin.loginbean.url_format + "stock_updatePosCd.jsp");
            string param = "stockInfo=" + dt_date.Text + ",";
            param += pos_cd + ",";
            param += label_no + ",";
            param += FormLogin.loginbean.user_id + ",";
            param += FormLogin.loginbean.db_status.ToString();

            Encoding encoding = Encoding.UTF8;
            byte[] bp = encoding.GetBytes(param);

            if (url.Scheme == Uri.UriSchemeHttp)
            {
                HttpWebRequest req = null;
                try
                {
                    req = (HttpWebRequest)WebRequest.Create(url);
                    req.Method = "POST";
                    req.ContentType = "application/x-www-form-urlencoded";
                    req.ContentLength = bp.Length;
                    Stream stream = req.GetRequestStream();
                    stream.Write(bp, 0, bp.Length);
                    stream.Close();
                }
                catch (UriFormatException urlE)
                {
                    MessageBox.Show(urlE.Message);
                    return;
                }

                HttpWebResponse response = null;
                try
                {
                    response = (HttpWebResponse)req.GetResponse();
                    StreamReader readStream = new StreamReader(response.GetResponseStream(), Encoding.UTF8, true);
                    string reader = readStream.ReadToEnd().Trim();

                    readStream.Close();
                    response.Close();

                    //MessageBox.Show(reader);

                    if (reader.Length < 3)
                    {
                        if (reader.Equals("UE"))
                        {
                            MessageBox.Show("재고조사 중 에러가 발생했습니다.");
                        }

                        return;
                    }
                    else
                    {
                        string[] dataObject = reader.Split(',');
                        if (dataObject.Length > 0)
                        {
                            t_pos_cd_pre.Text = dataObject[1].Replace("null", "");

                            t_pos_cd.Text = null;
                            t_label_no.Focus();
                        }
                    }
                }
                catch (WebException we)
                {
                    MessageBox.Show(we.Message);
                    return;
                }
            }
        }

        private void p_menu_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void p_clear_Click(object sender, EventArgs e)
        {
            t_label_no.Text = null;
            t_pack_no.Text = null;
            t_coil_no.Text = null;
            t_name_nm.Text = null;
            t_stan_nm.Text = null;
            t_size_no.Text = null;
            t_quantity.Text = null;
            t_weight.Text = null;
            t_pos_cd_pre.Text = null;
            t_pos_cd.Text = null;
            label_no = null;
            lv_stock_list.Items.Clear();
            getSysDate();
        
        }

        private void getSysDate()
        {
            Uri url = new Uri(FormLogin.loginbean.url_format + "stock_getSysDate.jsp");
            string param = "db_status=" + FormLogin.loginbean.db_status.ToString();
            Encoding encoding = Encoding.UTF8;
            byte[] bp = encoding.GetBytes(param);

            if (url.Scheme == Uri.UriSchemeHttp)
            {
                HttpWebRequest req = null;
                try
                {
                    req = (HttpWebRequest)WebRequest.Create(url);
                    req.Method = "POST";
                    req.ContentType = "application/x-www-form-urlencoded";
                    req.ContentLength = bp.Length;
                    Stream stream = req.GetRequestStream();
                    stream.Write(bp, 0, bp.Length);
                    stream.Close();
                }
                catch (UriFormatException urlE)
                {
                    MessageBox.Show(urlE.Message);
                    return;
                }

                HttpWebResponse response = null;
                try
                {
                    response = (HttpWebResponse)req.GetResponse();
                    StreamReader readStream = new StreamReader(response.GetResponseStream(), Encoding.UTF8, true);
                    string reader = readStream.ReadToEnd().Trim();

                    readStream.Close();
                    response.Close();

                    if (reader.Length >= 8)
                    {
                        dt_date.Value = Convert.ToDateTime(reader);
                    }
                }
                catch (WebException we)
                {
                    MessageBox.Show(we.Message);
                    return;
                }
                                
            }
        }
             

        private void submitData()
        {
           
                        
            string stockInfo = dt_date.Text + ",";
            stockInfo += t_pos_cd.Text + ",";
            stockInfo += t_label_no.Text + ",";
            stockInfo += FormLogin.loginbean.user_id + ",";
            stockInfo += FormLogin.loginbean.workplace_cd + ",";
            stockInfo += FormLogin.loginbean.db_status.ToString() + ",";
            stockInfo += FormLogin.loginbean.now_work_cust_cd + ",";
            stockInfo += yard.SelectedValue;

            Uri url = new Uri(FormLogin.loginbean.url_format + "stock_submitData.jsp");
            string param = "stockInfo=" + stockInfo;
            Encoding encoding = Encoding.UTF8;
            byte[] bp = encoding.GetBytes(param);

            if (url.Scheme == Uri.UriSchemeHttp)
            {
                HttpWebRequest req = null;
                try
                {
                    req = (HttpWebRequest)WebRequest.Create(url);
                    req.Method = "POST";
                    req.ContentType = "application/x-www-form-urlencoded";
                    req.ContentLength = bp.Length;
                    Stream stream = req.GetRequestStream();
                    stream.Write(bp, 0, bp.Length);
                    stream.Close();
                }
                catch (UriFormatException urlE)
                {
                    MessageBox.Show(urlE.Message);
                    return;
                }

                HttpWebResponse response = null;
                try
                {
                    response = (HttpWebResponse)req.GetResponse();
                    StreamReader readStream = new StreamReader(response.GetResponseStream(), Encoding.UTF8, true);
                    string reader = readStream.ReadToEnd().Trim();

                    readStream.Close();
                    response.Close();

                    //MessageBox.Show(reader);
                                                                                                                 
                                                   
                                                      
                    if (reader.Length < 3)
                    {
                        switch (reader)
                        {
                            case "UE":
                                MessageBox.Show("Update 처리 중 에러가 발생했습니다.");
                                break;

                            case "IE":
                                MessageBox.Show("Insert 처리 중 에러가 발생했습니다.");
                                break;

                            case "DE":
                                MessageBox.Show("중복된 데이터가 존재합니다.");
                                break;
                        }


                        t_label_no.Select(0, t_label_no.Text.Length + 1);
                        t_label_no.Focus();
                    }
                    else
                    {
                        string[] dataObject = reader.Split(',');
                        if (dataObject.Length > 0)
                        {
                            string[] listView = new string[8];

                            if (dataObject[0].Equals("US"))
                            {
                                listView[0] = "√";
                            }
                            else    
                            {
                                listView[0] = "New";
                            }

                            if (dataObject[3] == null ||dataObject[3] == "" || dataObject[0].Equals("IS"))  
                            {
                                MessageBox.Show("재고조사DB에 해당라벨이 존재 하지 않습니다.");
                                
                            }
                            
                            listView[1] = dataObject[1].Replace("null", ""); // label_no
                            listView[2] = dataObject[2].Replace("null", ""); // pack_no
                            listView[3] = dataObject[3].Replace("null", ""); // 품명
                            listView[4] = dataObject[4].Replace("null", ""); // 재질
                            listView[5] = dataObject[5].Replace("null", ""); // size
                            listView[6] = System.String.Format("{0:#,##0}", System.Convert.ToSingle(dataObject[6])); // 수량
                            listView[7] = System.String.Format("{0:#,##0.0}", System.Convert.ToSingle(dataObject[7])); // 중량

                            var listViewItem = new ListViewItem(listView);
                            lv_stock_list.Items.Insert(0, listViewItem);

                            t_label_no.Text = null;
                            t_label_no.Focus();
                           
                                
                        }
                    }
                }
                catch (WebException we)
                {
                    MessageBox.Show(we.Message);
                    return;
                }
            }
        }
                                                   
   
      }
                    
    }
  
    








